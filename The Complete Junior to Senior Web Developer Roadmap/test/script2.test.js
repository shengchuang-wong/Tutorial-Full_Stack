const fetch = require('node-fetch');
const swapi = require('./script2');

// two approaches for async, assertions with done
it('calls swapi to get people', (done) => {
    expect.assertions(1);
    const data = swapi.getPeopleAsync(fetch).then(data => {
        expect(data.count).toEqual(87);
        done();
    });
});

// or return statement
it('calls swapi to get people with a promise', () => {
    expect.assertions(2);
    return swapi.getPeoplePromise(fetch).then(data => {
        expect(data.count).toEqual(87);
        expect(data.results.length).toBeGreaterThan(5);
    });
});

it.only('getPeople returns count and results', () => {
    const mockFetch = jest.fn()
        .mockReturnValue(Promise.resolve({
            json: () => Promise.resolve({
                count: 87,
                results: [0,1,2,3,4,5]
            })
        }));

    return swapi.getPeoplePromise(mockFetch)
        .then(data => {
            expect(mockFetch).toHaveBeenCalledTimes(1);
            expect(mockFetch.mock.calls.length).toBe(1);
            expect(mockFetch).toHaveBeenCalledWith('https://swapi.co/api/people');
            expect(data.count).toEqual(87);
            expect(data.results.length).toBe(6);
            expect(data.results).toEqual([0,1,2,3,4,5]);
        });
});