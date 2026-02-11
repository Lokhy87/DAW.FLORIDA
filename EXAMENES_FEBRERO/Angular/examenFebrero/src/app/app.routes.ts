import { Routes } from '@angular/router';
import { Header } from './components/header/header';
import { Ejercicio2 } from './views/ejercicio2/ejercicio2';
import { Ejercicio3 } from './views/ejercicio3/ejercicio3';
import { Ejercicio4 } from './views/ejercicio4/ejercicio4';

export const routes: Routes = [
    { path: '', redirectTo: 'header', pathMatch: 'full' },
    { path: 'header', component: Header },
    { path: 'ejercicio2', component: Ejercicio2 },
    { path: 'ejercicio3', component: Ejercicio3},
    { path: 'ejercicio4', component: Ejercicio4 }
];
