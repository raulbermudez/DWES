import { Component, OnInit } from '@angular/core';
import { Contacto } from '../../models/contacto';
import { ContactoService } from '../../services/contacto.service';
import { Router } from '@angular/router';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-contacto-agregar',
  imports: [FormsModule, CommonModule],
  templateUrl: './contacto-agregar.component.html',
  styleUrl: './contacto-agregar.component.css'
})
export class ContactoAgregarComponent implements OnInit{
  contacto: Contacto = {id:0, nombre:"", email: "", telefono: ""};
  constructor(private contactoService: ContactoService, private router: Router) {}
  ngOnInit(): void {
    console.log("Componente creado", this.contacto);
  }

  agregar(){
    console.log("Agregando registro");
    this.contactoService.agregarContacto(this.contacto).subscribe(
      (data) => {
        console.log("Contacto agregado", data);
        this.router.navigate(['/contactos']);
      },
      (error) => {
        console.log("Error al agregar contacto", error);
      }
    );
  }

  cancelar(){
    this.router.navigate(['/']);
  }
}
