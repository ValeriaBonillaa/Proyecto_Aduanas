function fntUsuario(){
  Swal.fire({
      title: '¡Éxito!',
      text: 'Agregado correctamente',
      icon: 'success',
      confirmButtonText: 'Aceptar'
    }).then((result) => {
      if (result.isConfirmed) {
          window.location.href = "http://localhost/laravel/aduanas/public/login"; // Cambia esta URL por la de destino
      }
  });
}

function fntExito(){
  Swal.fire({
      title: '¡Éxito!',
      text: 'Agregado correctamente',
      icon: 'success',
      confirmButtonText: 'Aceptar'
    }).then((result) => {
      if (result.isConfirmed) {
          window.location.href = "http://localhost/laravel/aduanas/public/Inicio"; // Cambia esta URL por la de destino
      }
  });
}

function fntDevolverse() {
  Swal.fire({
    title: "¿Quieres regresar a la página principal?",
    showDenyButton: true,
    confirmButtonText: "Si",
    denyButtonText: `No`
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href="http://localhost/laravel/aduanas/public/login"; // Redirigir a la página de inicio de sesión
    } else if (result.isDenied) {
    }
  });
}

function fntCancelar() {
  Swal.fire({
    title: "¿Quieres regresar a la página principal?",
    showDenyButton: true,
    confirmButtonText: "Si",
    denyButtonText: `No`
  }).then((result) => {
  if (result.isConfirmed) {
    window.location.href="http://localhost/laravel/aduanas/public/Inicio"; // Redirigir a la página de inicio de sesión
  } else if (result.isDenied) {
  }
  });
}