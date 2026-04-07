import { Component, EventEmitter, Input, Output } from '@angular/core';

@Component({
  selector: 'app-hexagon',
  imports: [],
  templateUrl: './hexagon.html',
  styleUrl: './hexagon.css',
})
export class Hexagon {

  @Input() letras: string[] = [];

  @Output() pulsacion = new EventEmitter<string>();

  public letraSeleccionada: string = '';

  public pulsar(p: string) {
    this.letraSeleccionada = p;
    this.pulsacion.emit(p)
  }


}
