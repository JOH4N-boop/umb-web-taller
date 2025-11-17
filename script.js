function mostrarPrioridad() {
    let prioridad = "alta"; // cámbiala para probar

    let mensaje;

    switch (prioridad) {
        case "alta":
            mensaje = "La prioridad es ALTA 🔥";
            break;
        case "media":
            mensaje = "La prioridad es MEDIA ⚠️";
            break;
        case "baja":
            mensaje = "La prioridad es BAJA 🟢";
            break;
        default:
            mensaje = "Prioridad desconocida";
    }

    document.getElementById("resultado").innerText = mensaje;
}

function sumarSaltando() {
    let suma = 0;

    for (let i = 1; i <= 10; i++) {
        if (i === 6) continue; // saltar el 6
        suma += i;
    }

    document.getElementById("resultado").innerText =
        "La suma del 1 al 10 sin incluir el 6 es: " + suma;
}
