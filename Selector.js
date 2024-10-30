import React, { useState } from 'react';
import { Select, MenuItem, FormControl, InputLabel } from '@mui/material';

function VehicleSelector() {
  const vehicles = ['Car', 'Bike', 'Truck', 'Bus', 'Boat'];
  const [selectedVehicle, setSelectedVehicle] = useState('');

  const handleChange = (event) => {
    setSelectedVehicle(event.target.value);
  };

  return (
    <div style={{ textAlign: 'center', marginTop: '50px' }}>
      <FormControl variant="outlined" style={{ minWidth: 200 }}>
        <InputLabel>Vehicle</InputLabel>
        <Select
          value={selectedVehicle}
          onChange={handleChange}
          label="Vehicle"
        >
          {vehicles.map((vehicle) => (
            <MenuItem key={vehicle} value={vehicle}>
              {vehicle}
            </MenuItem>
          ))}
        </Select>
      </FormControl>
    </div>
  );
}

export default VehicleSelector;
