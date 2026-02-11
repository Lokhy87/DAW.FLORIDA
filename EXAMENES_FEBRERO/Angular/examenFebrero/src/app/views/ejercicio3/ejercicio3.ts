import { Component, inject, OnInit } from '@angular/core';
import { Carousel } from '../../components/carousel/carousel';
import { MortyApi } from '../../services/morty-api';
import { Result, RickyMortyResponse } from '../../model/rickyMorty-characters.interface';
import { EpisodeResult } from '../../model/rickyMorty-episodes.interface';


@Component({
  selector: 'app-ejercicio3',
  imports: [Carousel],
  templateUrl: './ejercicio3.html',
  styleUrl: './ejercicio3.css',
})
export class Ejercicio3 implements OnInit {
  // Inyección del servicio con inject() (Angular moderno)
  // El servicio se encarga de las peticiones HTTP y devuelve Observables tipados
  private rickService = inject(MortyApi);

  /* "mode" controla qué dataset se está mostrando:
        - 'characters' => se renderiza el carrusel de personajes
        - 'episodes'   => se renderiza el carrusel de episodios 
  Esta variable se usa en el HTML con @if para decidir qué bloque pintar */
  public mode: 'characters' | 'episodes' = 'characters';

  // ─────────────────────────────────────────────────────────────
  // PERSONAJES (estado + paginación + navegación dentro de página)
  // ─────────────────────────────────────────────────────────────
  public characters: Result[] = [];   // Lista de personajes de la página actual (normalmente 20 por página).
  public totalPages?: number;         // Total de páginas disponibles de PERSONAJES (viene de response.info.pages).
  public currentPage: number = 1;     // Página actual de PERSONAJES (paginación de API). Importante: la API empieza en página 1 (no en 0).
  public currentIndex: number = 0;    // Índice actual del carrusel dentro de la página actual. Va de 0 a characters.length - 1.

  // ─────────────────────────────────────────────────────────────
  // CICLO DE VIDA
  // ─────────────────────────────────────────────────────────────
  ngOnInit(): void {
    this.loadPersonaje();
    this.loadEpisode();
  }

  // ─────────────────────────────────────────────────────────────
  // ACCIONES DE UI: cambiar de modo
  // ─────────────────────────────────────────────────────────────
  
  /* Botón "PERSONAJES": 
  Los botones de modo cambian CONTEXTO, no navegan el carrusel */
  public showCharacters(): void {
    this.mode = 'characters';   // Cambia el modo
    this.currentIndex = 0;      // Resetea indice del modo
    this.currentPage = 1;       // Resetea pagina del modo
    this.loadPersonaje();       // Lanza la carga HTTP
  }
  /* Botón "EPISODIOS":
  Misma idea que showCharacters pero para episodios */
  public showEpisodes(): void {
    this.mode = 'episodes';
    this.currentIndexEp = 0;
    this.currentPageEp = 1;
    this.loadEpisode();
  }

  // ─────────────────────────────────────────────────────────────
  // CARGA HTTP: PERSONAJES
  // ─────────────────────────────────────────────────────────────

  /* Llama al servicio para obtener PERSONAJES de la página actual.
  El subscribe se hace en el componente.
  Guardamos:
    - characters (lista)
    - totalPages (paginación global) */
  public loadPersonaje(): void {
    this.rickService.getPersonaje(this.currentPage).subscribe((response) => {
      this.characters = response.results;
      this.totalPages = response.info.pages;
      console.log('Personajes: ' , this.characters)
    })
  }

  // ─────────────────────────────────────────────────────────────
  // NAVEGACIÓN CIRCULAR: PERSONAJES (dentro de la página)
  // ─────────────────────────────────────────────────────────────

  /* Va al personaje anterior de forma circular
  Esta lógica es "carrusel" (índice dentro de página), NO cambia currentPage */
  public prevCharacter(): void {
    if (this.currentIndex === 0) {                     // Si estás en 0, saltas al último
      this.currentIndex = this.characters.length - 1;
        } else {                                       // Si no, restas 1
          this.currentIndex--;
        }
  }

  /* Va al siguiente personaje de forma circular */
  public nextCharacter(): void {
    if (this.currentIndex < this.characters.length - 1) { // Si no estás en el último, sumas 1
      this.currentIndex++;
        } else {                                          // Si estás en el último, vuelves a 0
          this.currentIndex = 0;
        }
  }

  // ─────────────────────────────────────────────────────────────
  // EPISODIOS (estado + paginación + navegación)
  // ─────────────────────────────────────────────────────────────

  /* */
  public episodes: EpisodeResult[] = [];  // Lista de episodios de la página actual
  public totalPagesEp?: number;           // Total de páginas disponibles de EPISODIOS.
  public currentPageEp: number = 1;       // Página actual de EPISODIOS.
  public currentIndexEp: number = 0;      // Índice actual del carrusel de EPISODIOS dentro de la página actual.
  /* Imagen por defecto para episodios:
        - La API de episodios NO devuelve imágenes, así que el padre le pasa una URL fija al componente Carousel para que pueda renderizar igual que con personajes.*/
  public defaultPhoto: string = 'https://media.posterstore.com/site_images/68631d8a25436f8361d7687a_1426348943_WB0095-8.jpg';

  // ─────────────────────────────────────────────────────────────
  // CARGA HTTP: EPISODIOS
  // ─────────────────────────────────────────────────────────────

  /* Llama al servicio para obtener EPISODIOS de la página actual.
  El subscribe se hace en el componente.
  Guardamos:
    - episodios (lista)
    - totalPagesEp (paginación global) */
  public loadEpisode(): void {
      this.rickService.getEpisode(this.currentPageEp).subscribe((response) => {
      this.episodes = response.results;
      this.totalPagesEp = response.info.pages;
      console.log('Episodios: ' , this.episodes)
    })
  }

  // ─────────────────────────────────────────────────────────────
  // NAVEGACIÓN CIRCULAR: EPISODIOS
  // ─────────────────────────────────────────────────────────────

  /* Anterior episodio de forma circular (misma lógica que personajes) */
  public prevEpisode(): void {
    if (this.currentIndexEp === 0) {
      this.currentIndexEp = this.episodes.length - 1;
        } else {
          this.currentIndexEp--;
        }
  }
  /* Siguiente episodio de forma circular */
  public nextEpisode(): void {
    if (this.currentIndexEp < this.episodes.length - 1) {
      this.currentIndexEp++;
        } else {
          this.currentIndexEp = 0;
        }
  }
}
