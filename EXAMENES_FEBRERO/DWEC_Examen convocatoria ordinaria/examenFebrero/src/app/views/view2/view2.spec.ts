import { ComponentFixture, TestBed } from '@angular/core/testing';

import { View2 } from './view2';

describe('View2', () => {
  let component: View2;
  let fixture: ComponentFixture<View2>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [View2]
    })
    .compileComponents();

    fixture = TestBed.createComponent(View2);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
