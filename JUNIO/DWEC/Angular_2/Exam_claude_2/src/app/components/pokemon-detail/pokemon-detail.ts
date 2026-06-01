import { Component, EventEmitter, Input, Output } from '@angular/core';

@Component({
  selector: 'app-pokemon-detail',
  imports: [],
  templateUrl: './pokemon-detail.html',
  styleUrl: './pokemon-detail.css',
})
export class PokemonDetail {
  public currentindex: number = 0;

  @Input() images: string[] = [];
  
  @Output() imagesSelection = new EventEmitter<string>();
  @Output() cerrarModal = new EventEmitter<void>();
  @Output() volver = new EventEmitter<void>();

  public selection(): void {
    this.imagesSelection.emit()
  };

  public cerrarTodo(): void {
    this.volver.emit()
  }

  public cierreMod(): void {
    this.cerrarModal.emit()
  }

  public siguiente(): void {
    this.currentindex = (this.currentindex + 1) % this.images.length;
  }

  public anterior(): void {
    this.currentindex = (this.currentindex - 1 + this.images.length) % this.images.length;
  }

}
