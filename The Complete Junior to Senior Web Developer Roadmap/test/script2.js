const fetch = require('node-fetch');

const getPeopleAsync = async fetch => {
    const response = await fetch('https://swapi.co/api/people');
    const data = await response.json();
    return {
        count: data.count,
        results: data.results
    }
}

const getPeoplePromise = fetch => {
    return fetch('https://swapi.co/api/people')
        .then(response => response.json())
        .then(data => {
            return {
                count: data.count,
                results: data.results
            }
        })
}

module.exports = {
    getPeopleAsync,
    getPeoplePromise
}

