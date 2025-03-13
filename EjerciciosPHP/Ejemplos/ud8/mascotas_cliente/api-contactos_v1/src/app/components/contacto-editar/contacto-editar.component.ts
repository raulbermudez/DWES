import { Component, OnInit } from '@angular/core';
import { Contacto } from '../../models/contacto';
import { ActivatedRoute, Router } from '@angular/router';
import { ContactoService } from '../../services/contacto.service';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-contacto-editar',
  imports: [CommonModule, FormsModule],
  templateUrl: './contacto-editar.component.html',
  styleUrl: './contacto-editar.component.css'
})
export class ContactoEditarComponent implements OnInit{
  contacto: Contacto = {id:0, nombre:'', telefono:'', email:''};
  constructor(private route:ActivatedRoute, private contactoService: ContactoService, private router: Router) {}

  ngOnInit(): void{
    const id = Number(this.route.snapshot.paramMap.get('id'));
    this.contactoService.getContacto(id).subscribe(data => this.contacto = data);
  }

  guardar(){
    this.contactoService.editarContacto(this.contacto).subscribe(data => {
      this.router.navigate(['/contactos']);
    });
  }

  cancelar(){
    this.router.navigate(['/contactos']);
  }

}
