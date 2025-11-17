import React, { useEffect, useState } from "react";

function App() {
  const [tareas, setTareas] = useState([]);
  const [titulo, setTitulo] = useState("");

  // Cargar tareas al iniciar
  useEffect(() => {
    fetch("http://localhost/api/index.php")
      .then((res) => res.json())
      .then((data) => setTareas(data));
  }, []);

  // Enviar nueva tarea
  const agregarTarea = (e) => {
    e.preventDefault();

    fetch("http://localhost/api/index.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ titulo }),
    }).then(() => {
      setTareas([...tareas, { titulo }]);
      setTitulo("");
    });
  };

  return (
    <div style={{ padding: "30px" }}>
      <h1>Tareas</h1>

      {/* Formulario */}
      <form onSubmit={agregarTarea}>
        <input
          type="text"
          value={titulo}
          onChange={(e) => setTitulo(e.target.value)}
          placeholder="Nueva tarea"
        />
        <button>Agregar</button>
      </form>

      {/* Lista */}
      <ul>
        {tareas.map((t, i) => (
          <li key={i}>{t.titulo}</li>
        ))}
      </ul>
    </div>
  );
}

export default App;
