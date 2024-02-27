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
                                        Ut velit est quam dolor ad a aliquid qui
                                        aliquid. Sequi ea ut et est quaerat
                                        sequi nihil ut aliquam. Occaecati alias
                                        dolorem mollitia ut. Similique ea
                                        voluptatem. Esse doloremque accusamus
                                        repellendus deleniti vel. Minus et
                                        tempore modi architecto.
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
