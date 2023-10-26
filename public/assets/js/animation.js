/**
   * Hero Animation
   */

const object = document.getElementById("arrow_under");
const tl = gsap.timeline({ repeat: -1, repeatDelay: 1.05 });

// Variable to store the initial viewport width
var initialViewportWidth = window.innerWidth || document.documentElement.clientWidth;

// Array of viewport widths to restart animation
const restartWidths = [768, 1024];

// Function to check and restart the GSAP animation
function checkRestartAnimation() {
  const viewportWidth = window.innerWidth || document.documentElement.clientWidth;

  if (restartWidths.includes(viewportWidth)) {
    // Restart the GSAP animation
    tl.restart();
  }
}

// Function to define the animation timeline
function defineAnimationTimeline() {
  tl.clear(); // Clear the timeline before redefining

  // Add animation steps to the timeline based on viewport width
  const animationSteps = [
    // Animation steps...
  ];

  // Add animation steps to the timeline
  animationSteps.forEach(step => {
    tl.to(object, step);
  });

  // Repeat the timeline infinitely
  tl.repeat(-1);
}

  //Function to apply styles based on viewport width
  function applyStylesBasedOnViewportWidth() {
    var viewportWidth = window.innerWidth || document.documentElement.clientWidth;

    if (viewportWidth <= 768) {
      // Apply styles for viewport width <= 768px
      // Code to modify CSS properties or add/remove CSS classes


      // first arrow 
      tl.to(object, {
        opacity: 0,
        ease: "expo.out",
      })
        .to(object, {
          rotation: 60,
        })
        .to(object, {
          y: "-23vw",
          x: "-4.4vw",
        })
        .to(object, {
          opacity: 1,
        })
        .to(object, {
          duration: 1.5,
          ease: "none",
          y: "7.3vw",
          x: "12.5vw",
        })

        .to(object, {
          opacity: 0,
          ease: "expo.out",
        })
        // second arrow
        .to(object, {
          rotation: 180,
        })
        .to(object, {
          y: "21.3vw",
          x: "3.5vw",
        })
        .to(object, {
          opacity: 1,
        })
        .
        to(object, {
          x: "-29.5vw",
          duration: 1.5,
          ease: "none",
        })
        .to(object, {
          opacity: 0,
          ease: "expo.out",
        })
        // thire arrow
        .to(object, {
          rotation: 301,
        })
        .to(object, {
          y: "8vw",
          x: "-38vw",
        })
        .to(object, {
          opacity: 1,
        })
        .to(object, {
          duration: 1.5,
          ease: "none",
          y: "-21.8vw",
          x: "-19.5vw",
        }).to(object, {
          opacity: 0,
          ease: "expo.out",
        })

        // Repeat the timeline infinitely
        tl.repeat(-1);

      const piggy = document.getElementById("piggy_money");
      const piggy_div = document.getElementById("piggy_div");
      const vaspay_logo = document.getElementById("vaspay_logo");
      const taxi_left = document.getElementById("taxi_left");
      const sport_car = document.getElementById("sport_car");
      const shopping_bag = document.getElementById("shopping_bag");
      const woman_first = document.getElementById("woman_first");
      const man_first = document.getElementById("man_first");

      function animateElementAsync() {

        return new Promise(resolve => {
          // set the opacity of piggy back to 1
          piggy.style.opacity = 1;
          gsap.from(piggy, {
            //   //? first arrow
            opacity: 1,
            delay: 2.4,
            duration: 1,

            y: "-6vw",
            ease: "none",
            onComplete: function () {

              // Fade out piggy div
              gsap.to(piggy_div, {
                opacity: 0,
                delay: 1,
                duration: 0.6,
                ease: "expo.in",
                onComplete: function () {
                  // fade in vaspay logo
                  gsap.to(vaspay_logo, {
                    opacity: 1,
                    duration: 0.4,
                    ease: "none",
                    onComplete: function () {
                      // switching taxi
                      gsap.to(taxi_left, {
                        delay: 0.2,
                        opacity: 0,
                        duration: 0.6,
                        ease: "expo.in",
                        onComplete: function () {
                          gsap.to(sport_car, {
                            opacity: 1,
                            duration: 0.8,
                            ease: "none",
                            // switching sport car 
                            onComplete: function () {
                              gsap.to(sport_car, {
                                delay: 1,
                                opacity: 0,
                                duration: 0.6,
                                ease: "expo.in",
                                onComplete: function () {

                                  gsap.to(shopping_bag, {
                                    opacity: 1,
                                    duration: 0.4,
                                    ease: "none",
                                    // switch the man image
                                    onComplete: function () {
                                      vaspay_logo.style.opacity = 0;
                                      piggy_div.style.opacity = 1;
                                      piggy.style.opacity = 0;

                                      gsap.to(man_first, {
                                        opacity: 0,
                                        duration: 1,
                                        ease: "expo.in",
                                        onComplete: function () {
                                          gsap.to(woman_first, {
                                            opacity: 1,
                                            duration: 1,
                                            ease: "none",

                                            onComplete: function () {
                                              man_first.style.opacity = 1;
                                              shopping_bag.style.opacity = 0;
                                              taxi_left.style.opacity = 1;


                                              gsap.to(woman_first, {
                                                opacity: 0,
                                                duration: 1,
                                                ease: "none",
                                                onComplete: resolve
                                              })
                                            }
                                          })
                                        }
                                      })
                                    }
                                  })
                                }
                              })
                            }
                          })
                        }
                      })
                    }

                  })
                }

                // onComplete:resolve
              });
            }

          });
        });
      }



      async function runAnimation() {

        while (true) {
          await animateElementAsync(); // Wait for the animation to complete
          await new Promise(resolve => setTimeout(resolve, 0)); // Wait for a 500ms delay
        }
      }

      runAnimation();

    } else if (viewportWidth <= 1024) {
      // Apply styles for viewport width <= 1024px
      // Code to modify CSS properties or add/remove CSS classes


      // first arrow 
      tl.to(object, {
        opacity: 0,
        ease: "expo.out",
      })
        .to(object, {
          rotation: 60,
        })
        .to(object, {
          y: "-17vw",
          x: "-3.4vw",
        })
        .to(object, {
          opacity: 1,
        })
        .to(object, {
          duration: 1.5,
          ease: "none",
          y: "5.4vw",
          x: "9.3vw",
        })

        .to(object, {
          opacity: 0,
          ease: "expo.out",
        })
        // second arrow
        .to(object, {
          rotation: 180,
        })
        .to(object, {
          y: "16vw",
          x: "3vw",
        })
        .to(object, {
          opacity: 1,
        })
        .
        to(object, {
          x: "-22vw",
          duration: 1.5,
          ease: "none",
        })
        .to(object, {
          opacity: 0,
          ease: "expo.out",
        })
        // third arrow
        .to(object, {
          rotation: 301,
        })
        .to(object, {
          y: "5vw",
          x: "-28vw",
        })
        .to(object, {
          opacity: 1,
        })
        .to(object, {
          duration: 1.5,
          ease: "none",
          y: "-17.8vw",
          x: "-14vw",
        }).to(object, {
          opacity: 0,
          ease: "expo.out",
        })

        // Repeat the timeline infinitely
        tl.repeat(-1);

      const piggy = document.getElementById("piggy_money");
      const piggy_div = document.getElementById("piggy_div");
      const vaspay_logo = document.getElementById("vaspay_logo");
      const taxi_left = document.getElementById("taxi_left");
      const sport_car = document.getElementById("sport_car");
      const shopping_bag = document.getElementById("shopping_bag");
      const woman_first = document.getElementById("woman_first");
      const man_first = document.getElementById("man_first");

      function animateElementAsync() {

        return new Promise(resolve => {
          // set the opacity of piggy back to 1
          piggy.style.opacity = 1;
          gsap.from(piggy, {
            //   //? first arrow
            opacity: 1,
            delay: 2.4,
            duration: 1,

            y: "-4vw",
            ease: "none",
            onComplete: function () {

              // Fade out piggy div
              gsap.to(piggy_div, {
                opacity: 0,
                delay: 1,
                duration: 0.6,
                ease: "expo.in",
                onComplete: function () {
                  // fade in vaspay logo
                  gsap.to(vaspay_logo, {
                    opacity: 1,
                    duration: 0.4,
                    ease: "none",
                    onComplete: function () {
                      // switching taxi
                      gsap.to(taxi_left, {
                        delay: 0.2,
                        opacity: 0,
                        duration: 0.6,
                        ease: "expo.in",
                        onComplete: function () {
                          gsap.to(sport_car, {
                            opacity: 1,
                            duration: 0.8,
                            ease: "none",
                            // switching sport car 
                            onComplete: function () {
                              gsap.to(sport_car, {
                                delay: 1,
                                opacity: 0,
                                duration: 0.6,
                                ease: "expo.in",
                                onComplete: function () {

                                  gsap.to(shopping_bag, {
                                    opacity: 1,
                                    duration: 0.4,
                                    ease: "none",
                                    // switch the man image
                                    onComplete: function () {
                                      vaspay_logo.style.opacity = 0;
                                      piggy_div.style.opacity = 1;
                                      piggy.style.opacity = 0;

                                      gsap.to(man_first, {
                                        opacity: 0,
                                        duration: 1,
                                        ease: "expo.in",
                                        onComplete: function () {
                                          gsap.to(woman_first, {
                                            opacity: 1,
                                            duration: 1,
                                            ease: "none",

                                            onComplete: function () {
                                              man_first.style.opacity = 1;
                                              shopping_bag.style.opacity = 0;
                                              taxi_left.style.opacity = 1;


                                              gsap.to(woman_first, {
                                                opacity: 0,
                                                duration: 1,
                                                ease: "none",
                                                onComplete: resolve
                                              })
                                            }
                                          })
                                        }
                                      })
                                    }
                                  })
                                }
                              })
                            }
                          })
                        }
                      })
                    }

                  })
                }

                // onComplete:resolve
              });
            }

          });
        });
      }



      async function runAnimation() {

        while (true) {
          await animateElementAsync(); // Wait for the animation to complete
          await new Promise(resolve => setTimeout(resolve, 0)); // Wait for a 500ms delay
        }
      }

      runAnimation();

    } else {
      // Apply styles for viewport width > 768px
      // Code to modify CSS properties or add/remove CSS classes

      // first arrow 
      tl.to(object, {
        opacity: 0,
        ease: "expo.out",
      })
        .to(object, {
          rotation: 60,
        })
        .to(object, {
          y: "-23vw",
          x: "-4.4vw",
        })
        .to(object, {
          opacity: 1,
        })
        .to(object, {
          duration: 1.5,
          ease: "none",
          y: "-7.3vw",
          x: "4.5vw",
        })

        .to(object, {
          opacity: 0,
          ease: "expo.out",
        })
        // second arrow
        .to(object, {
          rotation: 180,
        })
        .to(object, {
          y: "0vw",
          x: "-0vw",
        })
        .to(object, {
          opacity: 1,
        })
        .
        to(object, {
          x: "-18vw",
          duration: 1.5,
          ease: "none",
        })
        .to(object, {
          opacity: 0,
          ease: "expo.out",
        })
        // thire arrow
        .to(object, {
          rotation: 301,
        })
        .to(object, {
          y: "-7vw",
          x: "-22vw",
        })
        .to(object, {
          opacity: 1,
        })
        .to(object, {
          duration: 1.5,
          ease: "none",
          y: "-23vw",
          x: "-12.3vw",
        }).to(object, {
          opacity: 0,
          ease: "expo.out",
        })

        // Repeat the timeline infinitely
        tl.repeat(-1);

      const piggy = document.getElementById("piggy_money");
      const piggy_div = document.getElementById("piggy_div");
      const vaspay_logo = document.getElementById("vaspay_logo");
      const taxi_left = document.getElementById("taxi_left");
      const sport_car = document.getElementById("sport_car");
      const shopping_bag = document.getElementById("shopping_bag");
      const woman_first = document.getElementById("woman_first");
      const man_first = document.getElementById("man_first");

      function animateElementAsync() {

        return new Promise(resolve => {
          // set the opacity of piggy back to 1
          piggy.style.opacity = 1;
          gsap.from(piggy, {
            //   //? first arrow
            opacity: 1,
            delay: 2.4,
            duration: 1,

            y: "-4vw",
            ease: "none",
            onComplete: function () {

              // Fade out piggy div
              gsap.to(piggy_div, {
                opacity: 0,
                delay: 1,
                duration: 0.6,
                ease: "expo.in",
                onComplete: function () {
                  // fade in vaspay logo
                  gsap.to(vaspay_logo, {
                    opacity: 1,
                    duration: 0.4,
                    ease: "none",
                    onComplete: function () {
                      // switching taxi
                      gsap.to(taxi_left, {
                        delay: 0.2,
                        opacity: 0,
                        duration: 0.6,
                        ease: "expo.in",
                        onComplete: function () {
                          gsap.to(sport_car, {
                            opacity: 1,
                            duration: 0.8,
                            ease: "none",
                            // switching sport car 
                            onComplete: function () {
                              gsap.to(sport_car, {
                                delay: 1,
                                opacity: 0,
                                duration: 0.6,
                                ease: "expo.in",
                                onComplete: function () {

                                  gsap.to(shopping_bag, {
                                    opacity: 1,
                                    duration: 0.4,
                                    ease: "none",
                                    // switch the man image
                                    onComplete: function () {
                                      vaspay_logo.style.opacity = 0;
                                      piggy_div.style.opacity = 1;
                                      piggy.style.opacity = 0;

                                      gsap.to(man_first, {
                                        opacity: 0,
                                        duration: 1,
                                        ease: "expo.in",
                                        onComplete: function () {
                                          gsap.to(woman_first, {
                                            opacity: 1,
                                            duration: 1,
                                            ease: "none",

                                            onComplete: function () {
                                              man_first.style.opacity = 1;
                                              shopping_bag.style.opacity = 0;
                                              taxi_left.style.opacity = 1;


                                              gsap.to(woman_first, {
                                                opacity: 0,
                                                duration: 1,
                                                ease: "none",
                                                onComplete: resolve
                                              })
                                            }
                                          })
                                        }
                                      })
                                    }
                                  })
                                }
                              })
                            }
                          })
                        }
                      })
                    }

                  })
                }

                // onComplete:resolve
              });
            }

          });
        });
      }




      async function runAnimation() {

        while (true) {
          await animateElementAsync(); // Wait for the animation to complete
          await new Promise(resolve => setTimeout(resolve, 0)); // Wait for a 500ms delay
        }
      }

      runAnimation();
    }

    // Check and restart GSAP animation if necessary
  checkRestartAnimation();

    // Refresh the page if the viewport width has changed
  refreshPageIfWidthChanged();
  }
  
  // Function to refresh the page if the viewport width has changed
function refreshPageIfWidthChanged() {
  var currentViewportWidth = window.innerWidth || document.documentElement.clientWidth;

  if (currentViewportWidth !== initialViewportWidth) {
    location.reload();
  }
}

  // Call the function on initial page load
  applyStylesBasedOnViewportWidth();

  // Check viewport width on window resize
  window.addEventListener('resize', applyStylesBasedOnViewportWidth);

  // Restart the animation on each completion
  tl.eventCallback('onComplete', function () {
    tl.restart();
  });