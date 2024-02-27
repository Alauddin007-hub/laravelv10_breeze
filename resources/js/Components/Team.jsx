import React from 'react'

const Team = () => {
  return (
    <section id="team" className="team">
      <div className="container">
        <div className="section-title">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
        <div className="row">
          <div className="col-xl-3 col-lg-4 col-md-6">
            <div className="member">
              <img src="frontend/assets/img/team/team-1.jpg" className="img-fluid" alt />
              <div className="member-info">
                <div className="member-info-content">
                  <h4>Walter White</h4>
                  <span>Chief Executive Officer</span>
                  <div className="social">
                    <a href><i className="bi bi-twitter" /></a>
                    <a href><i className="bi bi-facebook" /></a>
                    <a href><i className="bi bi-instagram" /></a>
                    <a href><i className="bi bi-linkedin" /></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div className="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.1s">
            <div className="member">
              <img src="frontend/assets/img/team/team-2.jpg" className="img-fluid" alt />
              <div className="member-info">
                <div className="member-info-content">
                  <h4>Sarah Jhonson</h4>
                  <span>Product Manager</span>
                  <div className="social">
                    <a href><i className="bi bi-twitter" /></a>
                    <a href><i className="bi bi-facebook" /></a>
                    <a href><i className="bi bi-instagram" /></a>
                    <a href><i className="bi bi-linkedin" /></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div className="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.2s">
            <div className="member">
              <img src="frontend/assets/img/team/team-3.jpg" className="img-fluid" alt />
              <div className="member-info">
                <div className="member-info-content">
                  <h4>William Anderson</h4>
                  <span>CTO</span>
                  <div className="social">
                    <a href><i className="bi bi-twitter" /></a>
                    <a href><i className="bi bi-facebook" /></a>
                    <a href><i className="bi bi-instagram" /></a>
                    <a href><i className="bi bi-linkedin" /></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div className="col-xl-3 col-lg-4 col-md-6" data-wow-delay="0.3s">
            <div className="member">
              <img src="frontend/assets/img/team/team-4.jpg" className="img-fluid" alt />
              <div className="member-info">
                <div className="member-info-content">
                  <h4>Amanda Jepson</h4>
                  <span>Accountant</span>
                  <div className="social">
                    <a href><i className="bi bi-twitter" /></a>
                    <a href><i className="bi bi-facebook" /></a>
                    <a href><i className="bi bi-instagram" /></a>
                    <a href><i className="bi bi-linkedin" /></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  )
}

export default Team