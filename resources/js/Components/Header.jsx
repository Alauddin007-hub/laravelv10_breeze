import { Link } from '@inertiajs/react'
import React from 'react'

const Header = () => {
  return (
    <header id="header" className="fixed-top d-flex align-items-center">
    <div className="container d-flex align-items-center justify-content-between">
      <h1 className="logo"><a href="index.html">Groovin</a></h1>
      <a href="index.html" class="logo"><img src="frontend/assets/img/logo.png" alt="" class="img-fluid" /></a>
      <nav id="navbar" className="navbar">
        <ul>
          <li><Link className="nav-link scrollto active" href="/">Home</Link></li>
          <li><Link className="nav-link scrollto" href="about">About</Link></li>
          <li><Link className="nav-link scrollto" href="service">Services</Link></li>
          <li><Link className="nav-link scrollto" href="team">Team</Link></li>
          
          <li><Link className="nav-link scrollto" href="contact">Contact</Link></li>
          <li><Link className="getstarted scrollto" href="#">Sign in</Link></li>
        </ul>
        <i className="bi bi-list mobile-nav-toggle" />
      </nav>{/* .navbar */}
    </div>
  </header>
  )
}

export default Header