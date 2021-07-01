document.addEventListener("maps:load", function () {
    // This sample uses the Places Autocomplete widget to:
    // 1. Help the user select a place
    // 2. Retrieve the address components associated with that place
    // 3. Populate the form fields with those address components.
    // This sample requires the Places library, Maps JavaScript API.
    // Include the libraries=places parameter when you first load the API.
    // For example: <script
    // src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
    let autocomplete;
    let address1Field;

    function initAutocomplete() {
        address1Field = document.querySelector("#meet_location");
        // Create the autocomplete object, restricting the search predictions to
        // addresses in the US and Canada.
        autocomplete = new google.maps.places.Autocomplete(address1Field, {
            componentRestrictions: { country: ["id"] },
            fields: ["address_components", "geometry", "formatted_address"],
            types: ["address"],
        });
        // When the user selects an address from the drop-down, populate the
        // address fields in the form.
        autocomplete.addListener("place_changed", fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        const place = autocomplete.getPlace();
        let name = "";
        let state = "";
        let city = "";
        let village = "";
        let district = "";
        let country = "";
        let data = [];

        // Get each component of the address from the place details,
        // and then fill-in the corresponding field on the form.
        // place.address_components are google.maps.GeocoderAddressComponent objects
        // which are documented at http://goo.gle/3l5i5Mr
        for (const component of place.address_components) {
            const componentType = component.types[0];
            switch (componentType) {
                case "route": {
                    name = component.short_name;
                    break;
                }

                case "administrative_area_level_4":
                    village = component.short_name;
                    break;

                case "administrative_area_level_3":
                    district = component.short_name;
                    break;

                case "administrative_area_level_2":
                    city = component.long_name;
                    break;

                case "administrative_area_level_1": {
                    state = component.short_name;
                    break;
                }
                case "country":
                    country = component.long_name;
                    break;
            }
        }

        data.push({
            name: name,
            address: place.formatted_address,
            district: district,
            village: village,
            city: city,
            state: state,
            country: country,
            latitude: place.geometry.location.lat(),
            longitude: place.geometry.location.lng(),
        });
        Livewire.emit("updateLocation", data);
    }
    initAutocomplete();
});
