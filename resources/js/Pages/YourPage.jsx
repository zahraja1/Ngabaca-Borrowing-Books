// resources/js/Pages/YourPage.jsx
import React, { useState } from 'react';
import { InertiaLink } from '@inertiajs/inertia-react';

const YourPage = ({ data }) => {
    const [query, setQuery] = useState('');

    const handleSearch = () => {
        // Menggunakan Inertia untuk melakukan navigasi ke halaman pencarian
        inertia.post(route('your.search'), { query });
    };

    return (
        <div>
            <h1>Your Page</h1>
            <input type="text" value={query} onChange={(e) => setQuery(e.target.value)} />
            <button onClick={handleSearch}>Search</button>

            <ul>
                {data.map(item => (
                    <li key={item.id}>
                        {item.name}
                        <InertiaLink href={route('your.edit', item.id)}>Edit</InertiaLink>
                    </li>
                ))}
            </ul>
        </div>
    );
};

export default YourPage;