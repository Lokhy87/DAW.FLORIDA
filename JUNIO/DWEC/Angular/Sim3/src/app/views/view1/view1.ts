import { Component, inject } from '@angular/core';
import { FormControl, FormGroup, ReactiveFormsModule } from '@angular/forms';
import { GitHub } from '../../components/git-hub/git-hub';
import { GithubApiService } from '../../services/github-api-service';
import { GitHubResponse } from '../../models/github.interface';

type hist = {
  name: string;
  photos: string[];
}

@Component({
  selector: 'app-view1',
  imports: [ReactiveFormsModule, GitHub],
  templateUrl: './view1.html',
  styleUrl: './view1.css',
})
export class View1 {

  public githubService = inject(GithubApiService);
  
  public photos: string[] = [];
  public name: string = '';
  public historial: hist[] = [];

  reactiveForm = new FormGroup({
    name: new FormControl('', { nonNullable: true })
  })

  public onSubmit(): void {
    let data = this.reactiveForm.getRawValue();

    if (data.name != '') {
      this.githubService.getGitHub(data.name).subscribe((response: GitHubResponse) => {
        this.photos = response.items.slice(0, 5).map(item => item.avatar_url)
        this.name = data.name
        this.reactiveForm.reset();
        this.historial.push({ // Añade historial al array
            name: data.name,
            photos: response.items.slice(0, 5).map(item => item.avatar_url)
        });
      });
    }
  }

  public volver(): void {
    this.photos = [];
  }

  



}
