import * as THREE from "https://cdn.jsdelivr.net/npm/three@0.129.0/build/three.module.js";
import { GLTFLoader } from "https://cdn.skypack.dev/three@0.129.0/examples/jsm/loaders/GLTFLoader.js";
import { OrbitControls } from "https://cdn.skypack.dev/three@0.129.0/examples/jsm/controls/OrbitControls.js";
// --------------------------------------------------
// 1) Escena, cámara y renderer
// --------------------------------------------------
const container = document.getElementById("container3D");

const scene = new THREE.Scene();
scene.background = null; // transparente

const camera = new THREE.PerspectiveCamera(60, 1, 0.1, 100);

// Un poco más alejado que antes
const baseCamPos = new THREE.Vector3(2.6, 1.9, 4.2);
camera.position.copy(baseCamPos);
camera.lookAt(0, 0.5, 0);

const renderer = new THREE.WebGLRenderer({
  antialias: true,
  alpha: true,
});
renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
renderer.shadowMap.enabled = true;
renderer.shadowMap.type = THREE.PCFSoftShadowMap;

container.appendChild(renderer.domElement);

// --------------------------------------------------
// Barrido de color para partículas (se percibe mucho más)
// --------------------------------------------------
// Ajusta estos valores a tu gusto
const particleSweepColorA = new THREE.Color(0x00ffff);
const particleSweepColorB = new THREE.Color(0xff00ff);
const particleSweepSpeed = 2.0;    // velocidad del barrido
const particleSweepFreq = 3.0;     // "anchura" (más alto = más franjas)
let particleYMin = 0;
let particleYMax = 1;
const _tmpSweepColor = new THREE.Color();


// --------------------------------------------------
// 2) Objetos (cubo + suelo) + sombras
// --------------------------------------------------

const ground = new THREE.Mesh(
  new THREE.CylinderGeometry(1, 3, 0.2, 64),
  new THREE.ShadowMaterial()
);
ground.position.set(0, -0.1, 0);
ground.receiveShadow = true;
scene.add(ground);

function cube3d(posX) {
  const cube = new THREE.Mesh(
    new THREE.BoxGeometry(1, 1, 1),
    new THREE.MeshStandardMaterial({ color: 0x33bbff })
  );
  cube.position.set(posX, 0.5, 0);
  cube.scale.set(0.1, 0.1, 0.1);
  cube.castShadow = true;
  cube.name = "cube";
  scene.add(cube);
}

// GEOMETRIA PERSONALIZADA
const loader = new GLTFLoader();

// --- Toggle: geometría <-> partículas ---
let modelRoot = null; // wrapper que contiene el modelo y las partículas
let loadedModel = null;
let particlePoints = null;
let showingParticles = false;

function buildParticlesFromModel(root, model, options = {}) {
  const {
    maxPoints = 12000, // límite para no matar el rendimiento
    size = 0.02,
    opacity = 0.9,
  } = options;

  // Asegura matrices al día
  root.updateMatrixWorld(true);

  const rootInv = new THREE.Matrix4().copy(root.matrixWorld).invert();
  const positions = [];

  model.traverse((child) => {
    if (!child.isMesh || !child.geometry) return;
    const geo = child.geometry;
    const posAttr = geo.attributes.position;
    if (!posAttr) return;

    // Convierte los vértices a coordenadas locales de 'root'
    const mw = child.matrixWorld;
    const v = new THREE.Vector3();
    const vWorld = new THREE.Vector3();
    const vRoot = new THREE.Vector3();
    for (let i = 0; i < posAttr.count; i++) {
      v.fromBufferAttribute(posAttr, i);
      vWorld.copy(v).applyMatrix4(mw);
      vRoot.copy(vWorld).applyMatrix4(rootInv);
      positions.push(vRoot.x, vRoot.y, vRoot.z);
    }
  });

  // Submuestreo si hay demasiados puntos
  const totalPoints = Math.floor(positions.length / 3);
  if (totalPoints > maxPoints) {
    const stride = Math.ceil(totalPoints / maxPoints);
    const sampled = [];
    for (let i = 0; i < totalPoints; i += stride) {
      const k = i * 3;
      sampled.push(positions[k], positions[k + 1], positions[k + 2]);
    }
    positions.length = 0;
    positions.push(...sampled);
  }

  const pointsGeo = new THREE.BufferGeometry();
  pointsGeo.setAttribute(
    "position",
    new THREE.Float32BufferAttribute(positions, 3)
  );
  // Colores por vértice (se actualizarán en animate para el barrido)
  const colors = new Float32Array((positions.length / 3) * 3);
  pointsGeo.setAttribute("color", new THREE.BufferAttribute(colors, 3));

  // Calcula rango Y para normalizar el barrido
  particleYMin = Infinity;
  particleYMax = -Infinity;
  for (let i = 1; i < positions.length; i += 3) {
    const y = positions[i];
    if (y < particleYMin) particleYMin = y;
    if (y > particleYMax) particleYMax = y;
  }
  if (!isFinite(particleYMin) || particleYMax === particleYMin) {
    particleYMin = 0;
    particleYMax = 1;
  }


  const pointsMat = new THREE.PointsMaterial({
    size,
    sizeAttenuation: true,
    vertexColors: true,
    transparent: true,
    opacity,
    depthWrite: false,
  });

  const points = new THREE.Points(pointsGeo, pointsMat);
  points.visible = false;
  points.frustumCulled = false; // evita "parpadeos" por bounding box imprecisa
  root.add(points);
  return points;
}

function setParticlesMode(on) {
  showingParticles = !!on;
  if (loadedModel) loadedModel.visible = !showingParticles;
  if (particlePoints) particlePoints.visible = showingParticles;
  const btn = document.getElementById("toggleParticles");
  if (btn)
    btn.textContent = showingParticles ? "Ver geometría" : "Ver partículas";
}
loader.load(
  `./models/snakeVoxels.gltf`,
  (gltf) => {
    const model = gltf.scene;
    model.traverse((child) => {
      if (child.isMesh) {
        child.castShadow = true;
        child.receiveShadow = true;
      }
    });
    model.position.set(0, 0, 0);
    model.scale.set(0.1, 0.1, 0.1);

    // Wrapper para poder alternar visibilidades sin tocar transforms
    modelRoot = new THREE.Group();
    modelRoot.position.set(0, 0, 0);
    modelRoot.add(model);
    scene.add(modelRoot);

    loadedModel = model;
    particlePoints = buildParticlesFromModel(modelRoot, loadedModel, {
      maxPoints: 14000,
      size: 0.022,
      opacity: 0.9,
    });

    // UI: botón + atajo teclado
    const btn = document.getElementById("toggleParticles");
    btn?.addEventListener("click", () => setParticlesMode(!showingParticles));
    window.addEventListener("keydown", (e) => {
      if (e.code === "KeyP") setParticlesMode(!showingParticles);
    });

    setParticlesMode(false);
  },
  (xhr) => {
    console.log((xhr.loaded / xhr.total) * 100 + "% loaded");
  },
  (error) => {
    console.error("An error happened loading the model:", error);
  }
);

// --------------------------------------------------
// 3) Luces
// --------------------------------------------------
const ambientLight = new THREE.AmbientLight(0x404040, 5); // soft white light
scene.add(ambientLight);
const dirLight = new THREE.DirectionalLight(0xffffff, 1);
dirLight.position.set(-4, 10, 4);
dirLight.castShadow = true;
dirLight.shadow.mapSize.set(1024, 1024);
scene.add(dirLight);

scene.add(new THREE.AmbientLight(0xffffff, 0.5));

// --------------------------------------------------
// 4) Resize al tamaño visual del canvas
// --------------------------------------------------
function resize() {
  const canvas = renderer.domElement;
  const rect = canvas.getBoundingClientRect();
  camera.aspect = rect.width / rect.height;
  camera.updateProjectionMatrix();
  renderer.setSize(rect.width, rect.height, false);
}

resize();
window.addEventListener("resize", resize);

// --------------------------------------------------
// 5) Cursor GLOBAL -> parallax de cámara
// --------------------------------------------------
let cursorX = 0;
let cursorY = 0;

const parallaxX = 0.75;
const parallaxY = 0.5;
const parallaxSmooth = 0.08;

let smoothCursorX = 0;
let smoothCursorY = 0;

window.addEventListener(
  "pointermove",
  (e) => {
    cursorX = (e.clientX / window.innerWidth - 0.5) * 4;
    cursorY = (e.clientY / window.innerHeight - 0.5) * 4;
  },
  { passive: true }
);

// --------------------------------------------------
// 6) Scroll GLOBAL -> zoom
// --------------------------------------------------
const baseDistance = baseCamPos.length();

// un poco más alejado en general:
const minDistance = 2.2;
const maxDistance = 6.0;

const zoomSmooth = 0.1;
let targetDistance = Math.max(minDistance, baseDistance);
let currentDistance = targetDistance;

function clamp(v, min, max) {
  return Math.min(max, Math.max(min, v));
}

function updateZoomFromScroll() {
  const doc = document.documentElement;
  const maxScroll = Math.max(1, doc.scrollHeight - doc.clientHeight);
  const t = clamp(window.scrollY / maxScroll, 0, 1);

  // más scroll => más lejos
  targetDistance = minDistance + t * (maxDistance - minDistance);
}

window.addEventListener("scroll", updateZoomFromScroll, { passive: true });
updateZoomFromScroll();

// --------------------------------------------------
// 7) Animación (sin giro del cubo)
// --------------------------------------------------
function animate() {
  requestAnimationFrame(animate);

  // Barrido de color (por vértice) cuando se muestran partículas
  if (showingParticles && particlePoints?.geometry?.attributes?.color) {
    const time = performance.now() * 0.001;

    const posAttr = particlePoints.geometry.attributes.position;
    const colAttr = particlePoints.geometry.attributes.color;

    const yRange = particleYMax - particleYMin || 1;

    for (let i = 0; i < posAttr.count; i++) {
      const yNorm = (posAttr.getY(i) - particleYMin) / yRange; // 0..1
      const t = (Math.sin((yNorm * particleSweepFreq * Math.PI * 2) + (time * particleSweepSpeed)) + 1) / 2;
      _tmpSweepColor.copy(particleSweepColorA).lerp(particleSweepColorB, t);
      colAttr.setXYZ(i, _tmpSweepColor.r, _tmpSweepColor.g, _tmpSweepColor.b);
    }

    colAttr.needsUpdate = true;
  }

  // suaviza cursor
  smoothCursorX += (cursorX - smoothCursorX) * parallaxSmooth;
  smoothCursorY += (cursorY - smoothCursorY) * parallaxSmooth;

  // suaviza zoom
  currentDistance += (targetDistance - currentDistance) * zoomSmooth;

  // dirección base + parallax
  const dir = baseCamPos.clone();
  dir.x += smoothCursorX * parallaxX;
  dir.y += -smoothCursorY * parallaxY;
  dir.normalize();

  camera.position.copy(dir.multiplyScalar(currentDistance));
  camera.lookAt(0, 0.5, 0);

  renderer.render(scene, camera);
}

animate();

// ---------------------------------------------------------------------------
// Conway's Game of Life (proyecto especial debajo de "Proyectos")
// ---------------------------------------------------------------------------
function initConway() {
  const canvas = document.getElementById("golCanvas");
  if (!canvas) return;

  const ctx = canvas.getContext("2d", { alpha: true });
  const toggleBtn = document.getElementById("golToggle");
  const randomBtn = document.getElementById("golRandom");
  const clearBtn = document.getElementById("golClear");
  const speedSlider = document.getElementById("golSpeed");

  // Grid
  const CELL = 8; // tamaño de celda en píxeles (en el canvas lógico)
  let cols = Math.floor(canvas.width / CELL);
  let rows = Math.floor(canvas.height / CELL);
  let grid = new Uint8Array(cols * rows);
  let next = new Uint8Array(cols * rows);

  function idx(x, y) {
    return y * cols + x;
  }

  function resizeCanvasToCSS() {
    // Mantiene un canvas nítido: ajusta el tamaño interno a su tamaño CSS
    const rect = canvas.getBoundingClientRect();
    const dpr = Math.min(window.devicePixelRatio || 1, 2);
    canvas.width = Math.max(320, Math.floor(rect.width * dpr));
    canvas.height = Math.max(200, Math.floor(rect.height * dpr));
    cols = Math.floor(canvas.width / CELL);
    rows = Math.floor(canvas.height / CELL);
    grid = new Uint8Array(cols * rows);
    next = new Uint8Array(cols * rows);
    randomize(0.18);
    draw();
  }

  function draw() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    // fondo ligero
    ctx.fillStyle = "rgba(255,255,255,0.04)";
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    // celdas vivas
    ctx.fillStyle = "rgba(102, 204, 255, 0.9)";
    for (let y = 0; y < rows; y++) {
      for (let x = 0; x < cols; x++) {
        if (grid[idx(x, y)]) {
          ctx.fillRect(x * CELL, y * CELL, CELL - 1, CELL - 1);
        }
      }
    }
  }

  function step() {
    for (let y = 0; y < rows; y++) {
      for (let x = 0; x < cols; x++) {
        let n = 0;
        for (let oy = -1; oy <= 1; oy++) {
          for (let ox = -1; ox <= 1; ox++) {
            if (ox === 0 && oy === 0) continue;
            const xx = x + ox;
            const yy = y + oy;
            if (xx < 0 || yy < 0 || xx >= cols || yy >= rows) continue; // borde muerto
            n += grid[idx(xx, yy)];
          }
        }
        const alive = grid[idx(x, y)] === 1;
        next[idx(x, y)] =
          (alive && (n === 2 || n === 3)) || (!alive && n === 3) ? 1 : 0;
      }
    }
    const tmp = grid;
    grid = next;
    next = tmp;
  }

  function clear() {
    grid.fill(0);
    draw();
  }

  function randomize(p = 0.2) {
    for (let i = 0; i < grid.length; i++) grid[i] = Math.random() < p ? 1 : 0;
    draw();
  }

  // Interacción: click pinta/borra, shift+drag pinta
  let painting = false;
  let paintValue = 1;
  function cellFromEvent(e) {
    const r = canvas.getBoundingClientRect();
    const dpr = Math.min(window.devicePixelRatio || 1, 2);
    const x = Math.floor(((e.clientX - r.left) * dpr) / CELL);
    const y = Math.floor(((e.clientY - r.top) * dpr) / CELL);
    return { x, y };
  }

  canvas.addEventListener("pointerdown", (e) => {
    painting = true;
    canvas.setPointerCapture(e.pointerId);
    const { x, y } = cellFromEvent(e);
    if (x < 0 || y < 0 || x >= cols || y >= rows) return;
    const i = idx(x, y);
    paintValue = e.shiftKey ? 1 : grid[i] ? 0 : 1;
    grid[i] = paintValue;
    draw();
  });
  canvas.addEventListener("pointermove", (e) => {
    if (!painting) return;
    const { x, y } = cellFromEvent(e);
    if (x < 0 || y < 0 || x >= cols || y >= rows) return;
    grid[idx(x, y)] = paintValue;
    draw();
  });
  canvas.addEventListener("pointerup", () => (painting = false));
  canvas.addEventListener("pointercancel", () => (painting = false));

  // Play/Pause + velocidad
  let running = false;
  let fps = Number(speedSlider?.value ?? 12);
  let acc = 0;
  function loop(ts) {
    requestAnimationFrame(loop);
    if (!running) return;
    const dt = Math.min(0.05, (ts - (loop._last || ts)) / 1000);
    loop._last = ts;
    acc += dt;
    const stepEvery = 1 / fps;
    while (acc >= stepEvery) {
      step();
      acc -= stepEvery;
    }
    draw();
  }
  requestAnimationFrame(loop);

  function setRunning(v) {
    running = v;
    if (toggleBtn) toggleBtn.textContent = running ? "Pausa" : "Reanudar";
  }

  toggleBtn?.addEventListener("click", () => setRunning(!running));
  randomBtn?.addEventListener("click", () => randomize(0.2));
  clearBtn?.addEventListener("click", () => clear());
  speedSlider?.addEventListener(
    "input",
    () => (fps = Number(speedSlider.value))
  );

  window.addEventListener("keydown", (e) => {
    if (e.code === "Space") {
      e.preventDefault();
      setRunning(!running);
    }
  });

  // Ajuste responsivo
  window.addEventListener("resize", resizeCanvasToCSS);
  resizeCanvasToCSS();
}

initConway();

// ---------- Data Dashboard (Canvas) ----------
(() => {
  const canvas = document.getElementById("dashCanvas");
  if (!canvas) return; // por si no está en la página

  const ctx = canvas.getContext("2d", { alpha: false });

  const metricSelect = document.getElementById("metricSelect");
  const windowSelect = document.getElementById("windowSelect");
  const regenBtn = document.getElementById("regenData");

  const statMin = document.getElementById("statMin");
  const statAvg = document.getElementById("statAvg");
  const statMax = document.getElementById("statMax");
  const statLast = document.getElementById("statLast");

  // Preferencias (Application -> Local Storage)
  const LS_KEY = "dashPrefs_v1";
  const prefs = loadPrefs();

  metricSelect.value = prefs.metric;
  windowSelect.value = String(prefs.window);

  // Datos simulados (podrías sustituirlo por JSON real)
  let series = generateSeries(60);

  // Reducir consumo: dibujar SOLO cuando hace falta
  let dirty = true;
  let selectedIndex = null;

  function loadPrefs() {
    try {
      const raw = localStorage.getItem(LS_KEY);
      if (!raw) return { metric: "latency", window: 30 };
      const parsed = JSON.parse(raw);
      return {
        metric: parsed.metric || "latency",
        window: Number(parsed.window) || 30,
      };
    } catch {
      return { metric: "latency", window: 30 };
    }
  }

  function savePrefs() {
    localStorage.setItem(
      LS_KEY,
      JSON.stringify({ metric: metricSelect.value, window: Number(windowSelect.value) })
    );
  }

  function generateSeries(n) {
    // Cada punto: { t, latency, success, load }
    // Simulación suave para que el gráfico tenga sentido.
    const out = [];
    let latency = 180;
    let success = 97;
    let load = 220;

    for (let i = 0; i < n; i++) {
      latency = clamp(latency + rand(-18, 18), 80, 420);
      success = clamp(success + rand(-1.2, 1.2), 88, 100);
      load = clamp(load + rand(-25, 25), 80, 520);

      out.push({
        t: i,
        latency: Math.round(latency),
        success: round1(success),
        load: Math.round(load),
      });
    }
    return out;
  }

  function clamp(v, a, b) { return Math.max(a, Math.min(b, v)); }
  function rand(a, b) { return Math.random() * (b - a) + a; }
  function round1(x) { return Math.round(x * 10) / 10; }

  function getWindowedData() {
    const w = Number(windowSelect.value);
    return series.slice(-w);
  }

  function computeStats(values) {
    let min = Infinity, max = -Infinity, sum = 0;
    for (const v of values) {
      min = Math.min(min, v);
      max = Math.max(max, v);
      sum += v;
    }
    const avg = values.length ? sum / values.length : 0;
    const last = values.length ? values[values.length - 1] : 0;
    return { min, max, avg, last };
  }

  function formatValue(metric, v) {
    if (metric === "latency") return `${Math.round(v)} ms`;
    if (metric === "success") return `${round1(v)} %`;
    return `${Math.round(v)} req/min`;
  }

  function draw() {
    dirty = false;

    // Ajuste por DPR (nitidez sin escalar excesivo)
    const dpr = Math.min(window.devicePixelRatio || 1, 2);
    const cssW = canvas.clientWidth;
    const cssH = Math.round(cssW * (360 / 960));
    if (cssW > 0 && cssH > 0) {
      const w = Math.round(cssW * dpr);
      const h = Math.round(cssH * dpr);
      if (canvas.width !== w || canvas.height !== h) {
        canvas.width = w;
        canvas.height = h;
      }
    }

    const W = canvas.width;
    const H = canvas.height;

    // Fondo
    ctx.fillStyle = "#0b1020";
    ctx.fillRect(0, 0, W, H);

    const metric = metricSelect.value;
    const data = getWindowedData();
    const values = data.map((p) => p[metric]);

    // Stats UI
    const s = computeStats(values);
    statMin.textContent = formatValue(metric, s.min);
    statAvg.textContent = formatValue(metric, s.avg);
    statMax.textContent = formatValue(metric, s.max);
    statLast.textContent = formatValue(metric, s.last);

    // Márgenes
    const pad = Math.round(32 * (W / 960));
    const left = pad, right = W - pad;
    const top = pad, bottom = H - pad;

    // Ejes / grid
    ctx.strokeStyle = "rgba(255,255,255,0.10)";
    ctx.lineWidth = 1;

    // Grid horizontal (4 líneas)
    for (let i = 0; i <= 4; i++) {
      const y = top + ((bottom - top) * i) / 4;
      ctx.beginPath();
      ctx.moveTo(left, y);
      ctx.lineTo(right, y);
      ctx.stroke();
    }

    // Rango
    const vmin = Math.min(...values);
    const vmax = Math.max(...values);
    const span = Math.max(1e-6, vmax - vmin);

    const n = values.length;
    const xStep = (right - left) / Math.max(1, n - 1);

    // Línea
    ctx.strokeStyle = "rgba(120,200,255,0.95)";
    ctx.lineWidth = 2;
    ctx.beginPath();
    for (let i = 0; i < n; i++) {
      const x = left + i * xStep;
      const y = bottom - ((values[i] - vmin) / span) * (bottom - top);
      if (i === 0) ctx.moveTo(x, y);
      else ctx.lineTo(x, y);
    }
    ctx.stroke();

    // Punto seleccionado
    if (selectedIndex !== null && selectedIndex >= 0 && selectedIndex < n) {
      const x = left + selectedIndex * xStep;
      const y = bottom - ((values[selectedIndex] - vmin) / span) * (bottom - top);

      // crosshair
      ctx.strokeStyle = "rgba(255,255,255,0.22)";
      ctx.beginPath();
      ctx.moveTo(x, top);
      ctx.lineTo(x, bottom);
      ctx.stroke();

      // punto
      ctx.fillStyle = "rgba(255,255,255,0.9)";
      ctx.beginPath();
      ctx.arc(x, y, Math.max(4, Math.round(5 * (W / 960))), 0, Math.PI * 2);
      ctx.fill();

      // tooltip
      const label = formatValue(metric, values[selectedIndex]);
      ctx.font = `${Math.round(12 * (W / 960) + 10)}px system-ui`;
      const tw = ctx.measureText(label).width;
      const th = Math.round(18 * (W / 960) + 10);
      const tx = clamp(x - tw / 2, left, right - tw);
      const ty = clamp(y - th - 10, top, bottom - th);

      ctx.fillStyle = "rgba(0,0,0,0.55)";
      ctx.fillRect(tx - 8, ty - th + 6, tw + 16, th);

      ctx.fillStyle = "rgba(255,255,255,0.95)";
      ctx.fillText(label, tx, ty);
    }
  }

  function requestDraw() {
    if (dirty) return;
    dirty = true;
    requestAnimationFrame(() => {
      // ahorro: si la pestaña está oculta, no dibujar
      if (document.visibilityState !== "visible") return;
      draw();
      dirty = false;
    });
  }

  // Eventos
  metricSelect.addEventListener("change", () => {
    savePrefs();
    selectedIndex = null;
    draw();
  });

  windowSelect.addEventListener("change", () => {
    savePrefs();
    selectedIndex = null;
    draw();
  });

  regenBtn.addEventListener("click", () => {
    series = generateSeries(60);
    selectedIndex = null;
    draw();
  });

  // Click para seleccionar punto
  canvas.addEventListener("click", (e) => {
    const rect = canvas.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const n = getWindowedData().length;
    const idx = Math.round((x / rect.width) * (n - 1));
    selectedIndex = clamp(idx, 0, n - 1);
    draw();
  });

  // Redibujar en resize (sin bucle)
  window.addEventListener("resize", () => draw());

  // ahorro energía: no pintar al estar en background
  document.addEventListener("visibilitychange", () => {
    if (document.visibilityState === "visible") draw();
  });

  // Primer render
  draw();
})();
