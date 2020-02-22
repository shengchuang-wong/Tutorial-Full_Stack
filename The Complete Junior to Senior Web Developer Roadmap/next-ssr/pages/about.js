import Link from 'next/link';
import Image from '../components/Image';

const About = () => {
    return (
        <div stlye={{fontSize: '20px', color: 'cornflowerblue'}}>
            <h1>About</h1>
            <Link href="/">
                <button>Back</button>
            </Link>
            <Image />
            <p>I was a magician once</p>
        </div>
    );
}

export default About;