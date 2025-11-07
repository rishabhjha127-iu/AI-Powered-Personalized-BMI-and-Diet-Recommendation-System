Title:AI-Powered Personalized BMI and Diet Recommendation System
Phase 1-Completion Phase

Problem Statement:
Unhealthy lifestyles spreading as a global epidemic, personalized digital health solutions will help promote consistent engagement. Most people find it hard to understand their BMI or follow through good fitness plans. Existing BMI calculators only show a number without any tips or encouragement for determining sustained care to take.

Proposed Solution:
This project envisages a web-based application through which one enters the details like name, age, gender, height, weight, and contact information to be able to calculate BMI and categorize it as per standard health specifications. Using AI,system will be able to provide diet and exercise recommendations fitted to that person's body type and lifestyle. A professional report will be created, including an AI-generated before and after visualization to inspire the users. This report will be automatically sent to user through WhatsApp for convenience. On another note, the system will continue to remind users every week with  new diet charts tailored to fit their progress and goal, keeping the user motivated and transformed.

Expected Outcome:
The project intends to build an evolving intelligent wellness assistant that uses AI and automation as a means to enable and motivate people for healthier living through data-driven, personalized, and entertaining fitness planning.

Introduction:
Adopting unhealthy lifestyles evident by poor diet, inactivity, and lack of regularly scheduled physical activity, has become a worldwide public health problem. The increase in obesity, cardiovascular disease, diabetes, and other related conditions indicates the need for pre-emptive and personalized intervention. Standard health monitoring approaches, such as generic fitness plans or static BMI calculators, usually do not provide actionable information for the individual and what behavioural change, if any, can be sustained.

Digital health platforms, which can offer personalized insight, facilitate tracking of user progress, and reinforce adherence to improved wellness routines, have the potential to address these issues. What can be an issue, however, is that many health apps are either limited to simple monitoring, or present only basic and standardized recommendations as an output. Users often require motivation, adaptive guidance and interactive feedback to translate health data into appropriate, meaningful action that can ultimately lead to the more positive elements of their well-being.

This project will work in to offer a brief solution to these issues, through a web-based health management system that provides AI-based recommendation algorithms, visual or graphic tracking options, and automatic recommendations and updates. By monitoring user health metrics, structured guidance, and engagement consistently, the system will help in enabling users to make decisions based on, and to improve their knowledge, skills, and abilities, and attempt to put into practice specific healthy behavior changes. In the ideal case of the study, user successes will lead ultimately to improved decision-making, and the maintenance of your behavioral change cycle, behavioral change behavior, and eventually the maintenance of healthier habits.


Project Goals:

--> To create a cloud-based health management application that calculates the user’s Body Mass Index (BMI) based on information provided by the user such as age, gender, height, and weight. 

--> To give tailored health recommendations using integrated AI models off recommendations for diet and exercise. 

--> To create motivational graphics that depict potential body improvement, to keep users engaged in the program. 

-->To provide automated weekly health report updates to the user through an automated message API to continue to interact with the user. 
    
-->To build a responsive and intuitive user interface through current front end technology which allows the back-end application to process the user data. 

Techstack Overview:

  1.Frontend:

    -->JavaScript – Implements client-side interactivity and form handling.

    -->Bootstrap – Ensures a responsive and visually appealing user interface across devices.
    
  2.Backend:

    -->Laravel (PHP Framework) – Manages application logic, routes, and user data processing.

    -->PHP – Handles server-side operations, BMI calculations, and API integrations efficiently.

  3.APIs and AI Integration:

    -->GPT-4o-mini API – Generates personalized health, diet, and exercise recommendations.

    -->gpt-image-1 API – Produces AI-generated motivational visuals representing user progress.

    -->WhatsApp API – Delivers automated weekly updates, reminders, and personalized health reports directly to users.

  4.Database:

    -->MySQL – Stores user details and system-generated health data securely and efficiently.

  5.Tools & Environment:

    --> VS Code — Development environment

    -->Git / GitHub — Version control and project hosting

Phase status:

The project is in Development phase.

 -->Frontend development has been completed using Laravel, PHP, JavaScript, and Bootstrap, ensuring a responsive and user-friendly interface.

 -->Image generation functionality using the gpt-image-1 API is successfully integrated and operational.

 -->GPT-4o-mini API has been integrated for personalized text-based recommendations.

 -->Integration of the WhatsApp API and final testing of automated update features are in progress.
 
Risk Consideration:

This project involves several potential risks related to data handling, API integration, and system performance:

-->Integration Delays: Third-party API dependencies (such as WhatsApp and GPT models) may face downtime, access limitations, or version updates that could affect smooth functionality.

 -->Data Accuracy Risks: The system relies on user-provided details (age, height, weight, etc.), and inaccurate or incomplete inputs may lead to less reliable BMI calculations and recommendations.

 -->Performance Bottlenecks: As the number of users increases, multiple API calls (text, image, and messaging) could lead to higher response times and increased server load.

 -->Data Privacy Concerns: Handling user health data requires careful management to prevent unauthorized access or misuse, especially when integrating with external APIs.

 -->Scalability Challenges: The current design is suitable for a prototype or controlled user base; scaling to a production-level system may require backend optimization and advanced database management.

 -->AI Recommendation Limitations: The AI-generated diet and exercise plans depend on general health data and may not account for specific medical conditions or individual differences.
