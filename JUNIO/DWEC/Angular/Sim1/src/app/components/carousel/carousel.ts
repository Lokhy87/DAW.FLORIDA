import { Component, EventEmitter, Input, Output } from '@angular/core';
import { NgStyle } from '@angular/common';

@Component({
  selector: 'app-carousel',
  imports: [NgStyle],
  templateUrl: './carousel.html',
  styleUrl: './carousel.css',
})
export class Carousel {

  @Input() name: string = '';
  @Input() photos: string[] = [];

  public indiceActual: number = 0;

  @Output() cerrar = new EventEmitter<void>();


  public cerrarModal(): void {
    this.cerrar.emit()
  };

  public onPrev(): void {
    if (this.indiceActual === 0) {
      this.indiceActual = this.photos.length - 1;
    } else {
      this.indiceActual--
    }
    
  };

  public onNext(): void {
    if (this.indiceActual < this.photos.length - 1) {
      this.indiceActual++;
    } else {
      this.indiceActual = 0;
    }
    
  };


}
