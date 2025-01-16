async function fetchVehicleData() {
                try {
                    const response = await fetch('http://localhost:8080/t/vehicles/json');
                    const vehicles = await response.json();
                    console.log(vehicles); // Log the data to ensure it's coming through
                    populateVehicleGrid(vehicles);
                } catch (error) {
                    console.error("Error fetching vehicles:", error);
                }
            }

            // Populate the vehicle grid with data from the backend
            function populateVehicleGrid(vehicles) {
                const vehicleList = document.getElementById('vehicleList');
                vehicleList.innerHTML = ''; // Clear existing content

                vehicles.forEach(vehicle => {
                    const card = document.createElement('div');
                    card.classList.add('vehicle-card');
                    card.setAttribute('data-plate', vehicle.licensePlate);

                    card.innerHTML = `
                        <div class="bg-gray-50 p-4 rounded-lg shadow-sm border relative group cursor-pointer"
                            onclick="showVehicleDetails('${vehicle.id}', '${vehicle.licensePlate}', '${vehicle.make}', '${vehicle.model}', '${vehicle.type}', '${vehicle.status}', '${vehicle.imageUrl}', '${vehicle.gpsDeviceId}', '${vehicle.ownerId}')">
                            <img src="${vehicle.imageUrl}" alt="Vehicle Image" class="mb-2 rounded-lg w-24 h-24 object-cover">
                            <p class="font-semibold">${vehicle.make} ${vehicle.model}</p>
                            <p class="text-sm text-gray-500">Plate: ${vehicle.licensePlate}</p>
                        </div>
                    `;

                    vehicleList.appendChild(card);
                });
            }

            // Show vehicle details in the modal
            function showVehicleDetails(id, licensePlate, make, model, type, status, imageUrl, gpsDeviceId, ownerId) {
                document.getElementById('vehiclePlateNumber').textContent = licensePlate;
                document.getElementById('vehicleMake').textContent = make;
                document.getElementById('vehicleModel').textContent = model;
                document.getElementById('vehicleType').textContent = type;
                document.getElementById('vehicleStatus').textContent = status;
                document.getElementById('gpsDeviceId').textContent = gpsDeviceId;
                document.getElementById('vehicleOwner').textContent = ownerId;
                document.getElementById('vehicleImage').src = imageUrl;

                document.getElementById('editVehicleLink').href = `/t/vehicle-edit-unit/${id}`;
                document.getElementById('deleteVehicleLink').href = `/t/vehicles/${id}`;

                document.getElementById('vehicleModal').classList.remove('hidden');
            }

            // Close the vehicle details modal
            function closeVehicleDetails() {
                document.getElementById('vehicleModal').classList.add('hidden');
            }

            // Filter the vehicles based on the search input
            function filterVehicles() {
                const searchTerm = document.getElementById('vehicleSearch').value.toLowerCase();
                const vehicleCards = document.querySelectorAll('.vehicle-card');

                vehicleCards.forEach(card => {
                    const licensePlate = card.getAttribute('data-plate').toLowerCase();

                    if (licensePlate.includes(searchTerm)) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            // Fetch data when the page loads
            window.onload = fetchVehicleData;