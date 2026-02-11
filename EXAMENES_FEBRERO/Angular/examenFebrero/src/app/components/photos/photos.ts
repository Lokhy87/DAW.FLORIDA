import { Component, EventEmitter, Input, Output } from '@angular/core';

@Component({
  selector: 'app-photos',
  imports: [],
  templateUrl: './photos.html',
  styleUrl: './photos.css',
})
export class Photos {
  @Input() sprites4: string[] = [];
  @Output() volverEstado = new EventEmitter(); // Como no necesito datos no le pongo <tipo>

  public notificarRegreso() {
    this.volverEstado.emit();
  };

  public selectPhoto: string | null = null;

}
