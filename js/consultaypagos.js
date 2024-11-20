// Objeto para almacenar las citas. La clave es la fecha y el valor es el nombre del paciente.
const appointments = {};

// Agregar evento al botón "Agregar Familiar"
document.getElementById('addFamilyMember').addEventListener('click', function() {
    const familyMembersDiv = document.getElementById('familyMembers');

    // Crear un nuevo div para el familiar
    const newFamilyMemberDiv = document.createElement('div');
    newFamilyMemberDiv.classList.add('row', 'g-3', 'mb-3');

    newFamilyMemberDiv.innerHTML = `
        <div class="col-md-4">
            <label for="familyMemberName" class="form-label">Nombre del Familiar</label>
            <input type="text" class="form-control familyMemberName" placeholder="Ej: Juan Pérez" required>
        </div>
        <div class="col-md-3">
            <label for="familyService" class="form-label">Servicio del Familiar</label>
            <select class="form-select familyService" required>
                <option value="">Seleccione un servicio</option>
                <option value="Limpieza">Limpieza: 50$</option>
                <option value="Extracción">Extracción: 100$</option>
                <option value="Ortodoncia">Ortodoncia: 200$</option>
            </select>
        </div>`;

    familyMembersDiv.appendChild(newFamilyMemberDiv);
});

// Agregamos un evento al formulario para manejar la acción de envío
document.getElementById('appointmentForm').addEventListener('submit', function(event) {
    // Prevenir el comportamiento por defecto del formulario (recargar la página)
    event.preventDefault();

    // Obtener los valores ingresados por el usuario
    const patientName = document.getElementById('patientName').value.trim(); // Nombre del paciente
    const lastName = document.getElementById('lastName').value.trim(); // Apellido del paciente
    const service = document.getElementById('service').value; // Servicio seleccionado
    const appointmentDate = document.getElementById('appointmentDate').value; // Fecha de la consulta

    // Verificar si ya hay una cita para la fecha seleccionada
    if (appointments[appointmentDate]) {
        // Si ya hay una cita, mostrar un mensaje de error
        document.getElementById('availability').innerText = `Lo siento, ya hay una cita reservada para el ${appointmentDate}.`;
        return; // Salir de la función para no continuar con el proceso
    }

    // Si no hay citas, reservar la cita para el paciente
    appointments[appointmentDate] = `${patientName} ${lastName}`; // Guardar el nombre completo del paciente en la fecha correspondiente
    document.getElementById('availability').innerText = `Cita confirmada para ${patientName} ${lastName} el ${appointmentDate}.`;

    // Definir los precios de los servicios (asegurarse que coincidan con las opciones)
    const prices = { 'Limpieza': 50, 'Extracción': 100, 'Ortodoncia': 200 };
    
    // Calcular subtotal inicial con el servicio principal
    let subtotal = prices[service];

    // Obtener todos los servicios de los familiares y calcular su subtotal
    const familyServices = document.querySelectorAll('.familyService');
    
    familyServices.forEach(serviceSelect => {
        const familyService = serviceSelect.value;
        if (prices[familyService]) {
            subtotal += prices[familyService];
        }
    });

    // Calcular IVA (16%)
    const iva = subtotal * 0.16;
    
    // Calcular total a pagar sumando subtotal y IVA
    const total = subtotal + iva;

    // Mostrar resumen del pago al usuario
    document.getElementById('summary').innerHTML = `
        <h3>Resumen de Pago</h3>
        <p>Subtotal: $${subtotal}</p>
        <p>IVA (16%): $${iva.toFixed(2)}</p>
        <p>Total a Pagar: $${total.toFixed(2)}</p>`;

    // Calcular cuántas personas han sido atendidas en total hoy (incluyendo familiares)
    const totalAttended = 1 + familyServices.length; // 1 por el paciente principal + número de familiares
    
    // Mostrar cuántas personas han sido atendidas en el día
    document.getElementById('summary').innerHTML += `<p>Total atendidos hoy: ${totalAttended}</p>`;
});