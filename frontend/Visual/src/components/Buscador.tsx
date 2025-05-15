type Props = {
  valor: string;
  onCambiar: (nuevoValor: string) => void;
};

export default function Buscador({ valor, onCambiar }: Props) {
  return (
    <input
      className="buscador"
      type="text"
      placeholder="Buscar restaurante..."
      value={valor}
      onChange={(e) => onCambiar(e.target.value)}
    />
  );
}
