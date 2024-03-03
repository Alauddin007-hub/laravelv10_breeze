import Footer from '@/Components/Footer'
import Header from '@/Components/Header'
import About from '@/Components/About'
import Question from '@/Components/Question'
import Whyus from '@/Components/Whyus'
import React from 'react'

const AboutPage = () => {
  return (
    <div>
  {/* ======= Header ======= */}
  <Header />
  {/* ======= Hero Section ======= */}
  <section id="hero">
    <div className="hero-container">
      <div>
        <div className="carousel-item active" style={{backgroundImage: 'url(frontend/assets/img/slide/slide-3.jpg)'}}>
        <div className="carousel-container">
            <div className="carousel-content">
              <h2 className="animate__animated animate__fadeInDown">Grow Your Business</h2>
              <p className="animate__animated animate__fadeInUp">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit commodi nostrum voluptatibus est esse veniam nihil, necessitatibus eius at quae possimus blanditiis molestias sit magni facilis quidem.!</p>
            </div>
        </div>
        </div>
      </div>
    </div>
  </section>{/* End Hero */}
  <main id="main">

    {/* ======= About Section ======= */}
    <About />

    {/* ======= Why Us Section ======= */}
    <Whyus />
    
    {/* ======= Frequently Asked Questions Section ======= */}
    <Question />

  </main>{/* End #main */}
  {/* ======= Footer ======= */}
  <Footer /> 
</div>
  )
}

export default AboutPage