import { ComponentFixture, TestBed } from '@angular/core/testing';

import { View3 } from './view3';

describe('View3', () => {
  let component: View3;
  let fixture: ComponentFixture<View3>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [View3]
    })
    .compileComponents();

    fixture = TestBed.createComponent(View3);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
