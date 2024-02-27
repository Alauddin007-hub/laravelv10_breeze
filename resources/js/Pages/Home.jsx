import About from '@/Components/About'
import Contact from '@/Components/Contact'
import Footer from '@/Components/Footer'
import Header from '@/Components/Header'
import Question from '@/Components/Question'
import Services from '@/Components/Services'
import Team from '@/Components/Team'
import Whyus from '@/Components/Whyus'
import React from 'react'

export default function Home() {
  return (
    <div>
  {/* ======= Header ======= */}
  <Header />
  {/* ======= Hero Section ======= */}
  <section id="hero">
    <div className="hero-container">
      <div>
        <div className="carousel-item active" style={{backgroundImage: 'url(frontend/assets/img/slide/slide-1.jpg)'}}>
        <div className="carousel-container">
            <div className="carousel-content">
              <h2 className="animate__animated animate__fadeInDown">Grow Your Business</h2>
              <p className="animate__animated animate__fadeInUp">Ut velit est quam dolor ad a aliquid qui aliquid. Sequi ea ut et est quaerat sequi nihil ut aliquam. Occaecati alias dolorem mollitia ut. Similique ea voluptatem. Esse doloremque accusamus repellendus deleniti vel. Minus et tempore modi architecto.</p>
            </div>
        </div>
        </div>
      </div>
    </div>
  </section>{/* End Hero */}
  <main id="main">

    {/* ======= About Section ======= */}
    <About />

    {/* ======= Counts Section ======= */}
    <section id="counts" className="counts">
      <div className="container">
        <div className="row no-gutters">
          <div className="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div className="count-box">
              <i className="bi bi-emoji-smile" />
              <span data-purecounter-start={0} data-purecounter-end={232} data-purecounter-duration={1} className="purecounter" />
              <p><strong>Happy Clients</strong> consequuntur quae</p>
            </div>
          </div>
          <div className="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div className="count-box">
              <i className="bi bi-journal-richtext" />
              <span data-purecounter-start={0} data-purecounter-end={521} data-purecounter-duration={1} className="purecounter" />
              <p><strong>Projects</strong> adipisci atque cum quia aut</p>
            </div>
          </div>
          <div className="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div className="count-box">
              <i className="bi bi-headset" />
              <span data-purecounter-start={0} data-purecounter-end={1463} data-purecounter-duration={1} className="purecounter" />
              <p><strong>Hours Of Support</strong> aut commodi quaerat</p>
            </div>
          </div>
          <div className="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
            <div className="count-box">
              <i className="bi bi-people" />
              <span data-purecounter-start={0} data-purecounter-end={15} data-purecounter-duration={1} className="purecounter" />
              <p><strong>Hard Workers</strong> rerum asperiores dolor</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    {/* ======= Clients Section ======= */}
    <section id="clients" className="clients section-bg">
      <div className="container">
        <div className="row">
          <div className="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="frontend/assets/img/clients/client-1.png" className="img-fluid" alt />
          </div>
          <div className="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="frontend/assets/img/clients/client-2.png" className="img-fluid" alt />
          </div>
          <div className="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="frontend/assets/img/clients/client-3.png" className="img-fluid" alt />
          </div>
          <div className="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="frontend/assets/img/clients/client-4.png" className="img-fluid" alt />
          </div>
          <div className="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="frontend/assets/img/clients/client-5.png" className="img-fluid" alt />
          </div>
          <div className="col-lg-2 col-md-4 col-6 d-flex align-items-center justify-content-center">
            <img src="frontend/assets/img/clients/client-6.png" className="img-fluid" alt />
          </div>
        </div>
      </div>
    </section>{/* End Clients Section */}
    {/* ======= Services Section ======= */}
    <Services />
    {/* ======= Why Us Section ======= */}
    <Whyus />
    
    {/* ======= Team Section ======= */}
    <Team />
    
    {/* ======= Frequently Asked Questions Section ======= */}
    <Question />
    {/* ======= Contact Section ======= */}
    <Contact />
  </main>{/* End #main */}
  {/* ======= Footer ======= */}
  <Footer /> 
</div>


  )
}
