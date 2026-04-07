import { Component, EventEmitter, Input, Output } from '@angular/core';

@Component({
  selector: 'app-modal',
  imports: [],
  templateUrl: './modal.html',
  styleUrl: './modal.css',
})
export class Modal {

  @Input() title: string = '';
  @Input() characters: string[] = [];

  @Output() deseleccion = new EventEmitter<void>();

  public volver(): void {
    this.deseleccion.emit()
  }

  
}
