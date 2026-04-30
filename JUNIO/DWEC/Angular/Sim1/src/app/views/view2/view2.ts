import { Component, inject, OnInit } from '@angular/core';
import { Rick } from '../../components/rick/rick';
import { RickServiceApi } from '../../services/rick-service-api';
import { Result } from '../../models/rick.interface';
import { ChangeDetectorRef } from '@angular/core';

@Component({
  selector: 'app-view2',
  imports: [Rick],
  templateUrl: './view2.html',
  styleUrl: './view2.css',
})
export class View2 implements OnInit{

  public rickService = inject(RickServiceApi);

  public rickList: Result[] = [];
  public mortyList: Result[] = [];

  public actualRick: Result | null = null;
  public actualMorty: Result | null = null;

  public detailCharacter: Result | null = null;

  public mode: 'Inicio' | 'Mini Rick' | 'Mini Morty' | 'Detalle' = 'Inicio';

  private cdr = inject(ChangeDetectorRef);

  public ngOnInit(): void {
    this.rickService.getcharacter('Rick').subscribe(data => {
      this.rickList = data.results.slice(0, 5);
      this.actualRick = this.rickList[0]
      this.cdr.detectChanges();
    })

    this.rickService.getcharacter('Morty').subscribe(data => {
      this.mortyList = data.results.slice(0, 5);
      this.actualMorty = this.mortyList[0]
      this.cdr.detectChanges();
    })
  }

  public miniRick(): void {
    this.mode = 'Mini Rick'
  }

  public miniMorty(): void {
    this.mode = 'Mini Morty'
  }

  public selectChar(character: Result): void {
    this.detailCharacter = character;
    this.mode = 'Detalle';
  }

  public returnMenu(): void {
    this.mode = 'Inicio'
  }

}
