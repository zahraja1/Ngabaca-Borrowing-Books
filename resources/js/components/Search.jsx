import React, { useState } from 'react';
import axios from 'axios';

function Search() {
 const [search, setSearch] = useState('');
 const [result, setResult] = useState([]);
 const [error, setError] = useState(false);

 const fetchData = async (query) => {
    const response = await axios.get(`http://127.0.0.1:8000/api/buku`);
    setResult(response.data);
    setError(false);
 };

 const handleSearch = (event) => {
    setSearch(event.target.value);
 };

 const handleSubmit = (event) => {
    event.preventDefault();
    if (!search) return;
    fetchData(search);
 };

 return (
    <div className="App">
      <form onSubmit={handleSubmit}>
        <input type="text" placeholder="Search..." value={search} onChange={handleSearch} />
        <button type="submit">Search</button>
      </form>
      {error && <p>Error fetching data...</p>}
      {result && result.weather && (
        <div>
          <h2>{result.name}</h2>
          <p>{result.weather[0].description}</p>
        </div>
      )}
    </div>
 );
}

export default Search;