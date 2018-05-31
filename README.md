# kristiania-campusguide

This is the final assignment in the semester course PRO101 - Webprosjekt (Web Project) spanning over 2 weeks.

### The Assignment

The assignment we were given was to create an application or portal focusing on the different campuses of our school:
- How to get to campus
- How to get from one campus to another
- Facilities in the area such as cafés, bars, restaurants, gyms, parks etc.
- Other information that people who attend the campuses might want or need

##### Technical requirements
- Use WordPress (ready-made plugins, themes allowed - but also allowed to make our own)
- Use GitHub throughout the project where appropriate
  - Naturally the contributor graph is not representative here given that a lot of content is added directly into WordPress
- Should consider WCAG standards for accessibility in the solution (but not a requirement to be 100% compliant)
- Should be responsive and fully functional on both mobile and desktop browsers

##### Non-technical requirements
- Use Kanban for project management
- Create an intro-video for using Kanban with the tool of our choice
- Decisionmaking based on target usergroup surveys and usability testing

### The Result

Our finished product is a web application functioning as a campus guide for future and current students.
We chose to make our own theme, but instead use a plugin to help facilitate theming inside WordPress (with code) to get the exact look and feel we wanted.

The application consists of a front page where a menu with the different campuses are presented. On this page there are also some relevant shortcut links presented as icon buttons. 

Inside one of the campus pages the user is presented with some general info about the campus such as opening hours, address, phone number as well as a map section where the user can find out how to get to campus and also what facilities are in the area. There is a 3D model view of the campus building, which the user can drill down into in order to figure out where the different rooms are on campus. The user can also check to see what subject is behing held at each room for a given date. On the bottom of the campus page there is also a shortcut link icon section relevant to that specific campus.

- We made our own WordPress theme instead of using a ready-made one
- We used Bootstrap as our main front end framework, which helped facilitate both accessibility and responsiveness
- We used the PODS plugin to facilitate easier templating and custom post types
- We used the Google MAPS API and Google PLACES API with JavaScript in order to create the map-section of the pages
- We reverse engineered TimeEdit (our school's timetable/calendar application) requests in order to generate our own requests and display timetables for given rooms in our own application
- We modelled one of the campus buildings in Sketchup for a 3D model "room finder" and created mappings using SVG-floorplans and JavaScript/JQuery to display room information.

###### Plugin dependencies
- Pods - Custom Content Types and Fields
- Post Types Order
- SVG Support

** PODS **
We chose PODS to help facilitate templating and custom content types for the project.

It allows for fast and easy setting up of content types. You can create a new type and give it custom fields and have someone start adding in content immediately.
While content is being added, one can start setting up templates for the given content type. This is done from inside the WP dashboard, and with HTML/CSS/JS.
PODS content can be easily selected (single or multiple) from a placed shortcode, from a widget or from an auto-generated single-page based on the template you made.
PODS also has a very handy relationship functionality, where content types and fields can be connected to each other (e.g. this shortcut relates to this campus). All these things helped make sure that e.g. things that are supposed to be the same (e.g. every campus should have the same setup) ends up looking the same. It also helped spread the workload seeing as one could be focusing on templates, the other on adding content itself and someone else could be looking into the placement of the content on the application itself.