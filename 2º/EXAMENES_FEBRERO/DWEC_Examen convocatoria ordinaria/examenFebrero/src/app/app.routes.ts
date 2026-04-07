import { Routes } from '@angular/router';
import { Header } from './components/header/header';
import { View1 } from './views/view1/view1';
import { View2 } from './views/view2/view2';
import { View3 } from './views/view3/view3';

export const routes: Routes = [
    { path: '', redirectTo: 'header', pathMatch: 'full' },
    { path: 'view1', component: View1 },
    { path: 'view2', component: View2 },
    { path: 'view3', component: View3 }
];
