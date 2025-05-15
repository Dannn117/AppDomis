type Restaurante = {
  id: number;
  nombre: string;
  descripcion: string;
  imagen_url: string;
};

export default function RestauranteCard({ restaurante, onClick }: {
  restaurante: Restaurante;
  onClick: () => void;
}) {
  return (
    <div className="card-restaurante" onClick={onClick}>
      <img src={restaurante.imagen_url} alt={`Imagen de ${restaurante.nombre}`} />
      <div style={{ padding: '0.5rem 1rem' }}></div>
      <h3>{restaurante.nombre}</h3>
      <p>{restaurante.descripcion}</p>
    </div>
  );
}
