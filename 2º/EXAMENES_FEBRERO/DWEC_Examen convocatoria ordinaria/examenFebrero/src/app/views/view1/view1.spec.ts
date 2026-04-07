import { ComponentFixture, TestBed } from '@angular/core/testing';

import { View1 } from './view1';

describe('View1', () => {
  let component: View1;
  let fixture: ComponentFixture<View1>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [View1]
    })
    .compileComponents();

    fixture = TestBed.createComponent(View1);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
