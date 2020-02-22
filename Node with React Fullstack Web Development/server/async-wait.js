
// Old fashion
function fetchAlbums() {
	fetch('https://rallycoding.herokuapp.com/api/music_albums')
		.then(res => res.json())
		.then(json => console.log(json));
}

fetchAlbums();

// Async await
async function fetchAlbums() {
	const res = await fetch('https://rallycoding.herokuapp.com/api/music_albums');
	const json = await res.json();
	console.log(json);
}

fetchAlbums();

// Async await es6
const fetchAlbums = async () => {
	const res = await fetch('https://rallycoding.herokuapp.com/api/music_albums');
	const json = await res.json();
	console.log(json);
}

fetchAlbums();