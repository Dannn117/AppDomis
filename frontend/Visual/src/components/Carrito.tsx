import React, { useState } from 'react';

const Carrito: React.FC = () => {
  const [visible, setVisible] = useState(false);

  const toggleCarrito = () => setVisible(!visible);

  return (
    <>
      {/* Botón circular */}
      <button
        onClick={toggleCarrito}
        className="fixed top-4 right-4 z-50 w-12 h-12 bg-white shadow-md rounded-full flex items-center justify-center text-2xl hover:bg-gray-100 transition"
      >
        🛒
      </button>

      {/* Slidebar desde la derecha */}
      <div
        className={`fixed top-0 right-0 h-full w-64 bg-white/70 backdrop-blur-md border-l border-white shadow-lg transition-transform duration-300 z-40 ${
          visible ? 'translate-x-0' : 'translate-x-full'
        }`}
      >
        <div className="p-4">
          <h2 className="text-lg font-semibold mb-2">🛍️ Tu carrito</h2>
          <p className="text-sm text-gray-700">Aún no hay productos.</p>
        </div>
      </div>
    </>
  );
};

export default Carrito;
