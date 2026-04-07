import { NgStyle } from '@angular/common';
import { Component, EventEmitter, Input, Output } from '@angular/core';

@Component({
  selector: 'app-carousel',
  imports: [NgStyle],
  templateUrl: './carousel.html',
  styleUrl: './carousel.css',
})
export class Carousel {

  // ─────────────────────────────────────────────────────────────
  // INPUTS (Padre → Hijo)
  // ─────────────────────────────────────────────────────────────
  @Input() name: string = '';   // Texto que se muestra en el carrusel.
  @Input() photo: string = '';  // Imagen que se usa como background del carrusel.

  // ─────────────────────────────────────────────────────────────
  // OUTPUTS (Hijo → Padre)
  // ─────────────────────────────────────────────────────────────
  @Output() nextItem = new EventEmitter<void>();  // Evento que se emite cuando el usuario pulsa "SIGUIENTE".
  @Output() prevItem = new EventEmitter<void>();  // Evento que se emite cuando el usuario pulsa "ANTERIOR".

  // ─────────────────────────────────────────────────────────────
  // MÉTODOS DE UI (solo emiten eventos)
  // ─────────────────────────────────────────────────────────────
  
  // Llamado desde el botón "SIGUIENTE" del HTML
  public onNext() {
    this.nextItem.emit()
  };
  // Llamado desde el botón "ANTERIOR" del HTML.
  public onPrev() {
    this.prevItem.emit()
  };
}
