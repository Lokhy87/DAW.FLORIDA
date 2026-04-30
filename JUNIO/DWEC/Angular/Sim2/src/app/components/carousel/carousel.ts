import { Component, EventEmitter, Input, Output } from '@angular/core';
import { NgStyle } from "@angular/common";

@Component({
  selector: 'app-carousel',
  imports: [NgStyle],
  templateUrl: './carousel.html',
  styleUrl: './carousel.css',
})
export class Carousel {

  @Input() name: string = '';
  @Input() photo: string = '';

  @Output() nextItem = new EventEmitter<void>();
  @Output() prevItem = new EventEmitter<void>();

  public onNext(): void {
    this.nextItem.emit()
  };

  public onPrev(): void {
    this.prevItem.emit()
  };

}
