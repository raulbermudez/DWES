import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Contacto } from '../models/contacto';
import { environment } from '../environments/environment';

@Injectable({
  providedIn: 'root'
})
export class ContactoService{
	private baseURL = environment.baseUrl;
	constructor (private http:HttpClient) {}

	getContactos(): Observable<Contacto[]>{
		return this.http.get<Contacto[]>(`${this.baseURL}contactos`)
	}

  // Método para traer un contacto por id
	getContacto(id: number): Observable<Contacto>{
		return this.http.get<Contacto>(`${this.baseURL}contactos/${id}`)
	}

  // Método parea agregar un Contacto
	agregarContacto(contacto: Contacto){
		return this.http.post(`${this.baseURL}contactos/`, contacto);
	}

  // Método para editar un contacto
	editarContacto(contacto: Contacto){
		return this.http.put(`${this.baseURL}contactos/${contacto.id}`, contacto);
	}
}