import { Component, EventEmitter, Input, Output } from '@angular/core';

@Component({
  selector: 'app-git-hub',
  imports: [],
  templateUrl: './git-hub.html',
  styleUrl: './git-hub.css',
})
export class GitHub {

  @Input() termino: string = '';
  @Input() photos: string[] = []; 

  @Output() selection = new EventEmitter<void>();
  
  public selectedPhoto: string = '';

  public onClick(p: string) {
    this.selectedPhoto = p;
  }

  public volver(): void {
    this.selection.emit()
  }

}
