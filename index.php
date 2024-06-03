<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta</title>
    <link rel="stylesheet" href="Estilos/style.css">
</head>
<body>
    <header>
        <h1>Alta</h1>
    </header>
    <main>
        <form action="alta.php" method="post">
            <section>
                <article>
                    <label for="nombre">
                        <p>Nombre</p>
                        <input type="text" name="nombre" id="nombre">
                    </label>
                </article>
                <article>
                    <label for="apellido">
                        <p>Apellido</p>
                        <input type="text" name="apellido" id="apellido">
                    </label>
                </article>
                <article>
                    <label for="email">
                        <p>Email</p>
                        <input type="email" name="email" id="email">
                    </label>
                </article>
                <article>
                    <label for="fecha">
                        <p>Fecha nacimiento</p>
                        <input type="date" name="fecha" id="fecha">
                    </label>
                </article>
                <article>
                    <label for="telefono">
                        <p>Telefono</p>
                        <input type="tel" name="telefono" id="telefono" placeholder="Ej: 098121212">
                    </label>
                </article>
                <article>
                    <label for="genero">
                        <p>Genero</p>
                        <input type="radio" value="H" id="genero" name="genero">H
                        <input type="radio" value="M" id="genero" name="genero">M
                        <input type="radio" value="O" id="genero" name="genero">O
                    </label>
                </article>
                <article>
                    <label for="pais">
                        <p>País</p>
                    </label>
                        <input list="paises" id="pais" name="pais">
                        <datalist id="paises">
                            <option value="Uruguay">Uruguay</option>
                            <option value="Argentina">Argentina</option>
                            <option value="Brasil">Brasil</option>
                            <option value="Chile">Chile</option>
                            <option value="Bolivia">Bolivia</option>
                            <option value="Venezuela">Venezuela</option>
                            <option value="China">China</option>
                            <option value="Rusia">Rusia</option>
                            <option value="Estados Unidos">Estados Unidos</option>
                            <option value="El Congo">El Congo</option>
                        </datalist>
                    </article>
                    <article>
                        <label for="Boton">
                            <button type="submit">Enviar</button>
                        </label>
                    </article>
                </section>
        </form>
    </main>
    <footer>
        <p>Copyright </p>
    </footer>
</body>
</html>