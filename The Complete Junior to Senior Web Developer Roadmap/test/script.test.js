const googleSearch = require('./script');

const dbMock = [
    'cats.com',
    'souprecipes.com',
    'flowers.com',
    'animals.com',
    'catpictures.com',
    'myfacouritecats2.com'
];

describe('Testing: Goolge Search', () => {

    it('Should contains expected results', () => {
        const searchResults = googleSearch('cat', dbMock);
        expect(searchResults).toHaveLength(3);
        expect(searchResults).toEqual(["cats.com", "catpictures.com", "myfacouritecats2.com"]);
    });
    
    it('Should work with undefined and null input', () => {
        expect(googleSearch(undefined, dbMock)).toEqual([]);
        expect(googleSearch(null, dbMock)).toEqual([]);
    });

    it('Does not return more than 3 matches', () => {
        expect(googleSearch('.com', dbMock).length).toBeLessThanOrEqual(3);
    });

});

