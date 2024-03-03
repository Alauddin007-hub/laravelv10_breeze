import Footer from "@/Components/Footer";
import Header from "@/Components/Header";
import Services from "@/Components/Services";
import Whyus from "@/Components/Whyus";
import React from "react";

const ServicePage = () => {
    return (
        <div>
            {/* ======= Header ======= */}
            <Header />
            {/* ======= Hero Section ======= */}
            <section id="hero">
                <div className="hero-container">
                    <div>
                        <div
                            className="carousel-item active"
                            style={{
                                backgroundImage:
                                    "url(frontend/assets/img/slide/slide-2.jpg)",
                            }}
                        >
                            <div className="carousel-container">
                                <div className="carousel-content">
                                    <h2 className="animate__animated animate__fadeInDown">
                                        Grow Your Business
                                    </h2>
                                    <p className="animate__animated animate__fadeInUp">
                                    To want is how pain to a something who something. I followed them as it is and seeks to follow nothing. Darkened other pain relief as. Like that pleasure. We accuse him of being and suffering to be repelled by the tender or Less and less time for the architect.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            {/* End Hero */}
            <main id="main">
              {/* ======= Services Section ======= */}
              <Services />

              {/* ======= Why Us Section ======= */}
              <Whyus />
            </main>
            {/* End #main */}
            {/* ======= Footer ======= */}
            <Footer />
        </div>
    );
};

export default ServicePage;
