import React, { useEffect, useState } from 'react';
import RestauranteCard from '../components/RestauranteCard';
import Buscador from '../components/Buscador';
import Carrito from '../components/Carrito';



type Restaurante = {
  id: number;
  nombre: string;
  descripcion: string;
  imagen_url: string;
};

export default function Home() {
  const [restaurantes, setRestaurantes] = useState<Restaurante[]>([]);
  const [filtro, setFiltro] = useState('');

  useEffect(() => {
    fetch('http://localhost:8000/api/Restaurantes.php')
      .then(res => res.json())
      .then(data => setRestaurantes(data))
      .catch(error => console.error("Error al cargar restaurantes:", error));
  }, []);

  // Filtrado local por nombre
  const filtrados = restaurantes.filter(r =>
    r.nombre.toLowerCase().includes(filtro.toLowerCase())
  );

  const verProductos = (restauranteId: number) => {
    console.log("Cargar productos del restaurante ID:", restauranteId);
    // Aquí luego redirigimos o mostramos los productos
  };

  return (
  <div className="page-wrapper">
     
    <section className="container">
      <h1>🍔 Restaurantes disponibles</h1>

      <Buscador valor={filtro} onCambiar={setFiltro} />

      <div className="grid-restaurantes">
        {filtrados.map((rest) => (
          <RestauranteCard
            key={rest.id}
            restaurante={rest}
            onClick={() => verProductos(rest.id)}
          />
        ))}
      </div>
    </section>
  </div>
);

}
