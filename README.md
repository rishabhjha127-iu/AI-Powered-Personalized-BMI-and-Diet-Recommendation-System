Title:AI-Powered Personalized BMI and Diet Recommendation System
Phase 3-Finaltion Phase

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
The project is now finalized.

-->Frontend development has been completed using Laravel, PHP, JavaScript, and Bootstrap, providing a responsive and user-friendly interface.
-->Image generation using the GPT-Image-1 API is fully integrated and operational.
-->GPT-4o-mini API is successfully integrated for personalized diet and exercise recommendations.
-->WhatsApp API integration is complete, and all automated report delivery features have been tested and verified.
 
Risk Consideration:

This project involves several potential risks related to data handling, API integration, and system performance:

-->Integration Delays: Third-party API dependencies (such as WhatsApp and GPT models) may face downtime, access limitations, or version updates that could affect smooth functionality.

 -->Data Accuracy Risks: The system relies on user-provided details (age, height, weight, etc.), and inaccurate or incomplete inputs may lead to less reliable BMI calculations and recommendations.

 -->Performance Bottlenecks: As the number of users increases, multiple API calls (text, image, and messaging) could lead to higher response times and increased server load.

 -->Data Privacy Concerns: Handling user health data requires careful management to prevent unauthorized access or misuse, especially when integrating with external APIs.

 -->Scalability Challenges: The current design is suitable for a prototype or controlled user base; scaling to a production-level system may require backend optimization and advanced database management.

 -->AI Recommendation Limitations: The AI-generated diet and exercise plans depend on general health data and may not account for specific medical conditions or individual differences.

 Implementation:
 This AI-powered BMI & Health Tracking System is built using Laravel and leverages multiple APIs to provide personalized health insights.
 Workflow:
 -->User Input: Users submit personal details such as name, age, height, weight, occupation, nationality, health issues, and upload a photo.
 
 -->AI Processing:
    1.The photo is sent to GPT-Image API to generate a personalized health-related image.
    2.User data is sent to GPT API to generate a 90-day weekly diet and exercise plan tailored to the user’s profile.

-->PDF Generation: DomPDF is used to compile the AI-generated image and the diet/exercise plan into a downloadable PDF report.

-->Delivery: The PDF is sent directly to the user via WhatsApp (using Wasender API) or made available for download through the frontend.

Testing

1.User Input & Form Validation
 -->Verified all required fields (name, age, gender, height, weight) are filled and validated.
 -->Checked input formats (e.g., numeric fields, phone numbers) with client- and server-side validation.
 -->Image uploads were tested for file type (JPG, PNG, JPEG), size limits, and corruption.
 -->Edge cases like extreme height or age were rejected for safety.

2.BMI Calculation Verification
 -->Cross-checked BMI outputs against manual calculations.
 -->Verified correct category mapping (Underweight, Normal, Overweight, Obese) and decimal conversions.

3.AI Prompt & Response Testing (GPT-4o-mini)
 -->Tested diet/exercise plan generation for various user profiles.
 -->Ensured outputs include 12-week plans with structured weekly instructions.
 -->Checked for no incomplete sections and proper fallback messages for API failures.

4.AI Image Generation Testing
-->Confirmed successful processing of user photos and correct “Before”/“After” outputs.
-->Handled corrupted, missing, or oversized images with proper error messages.
-->Verified base64 decoding and storage on multiple devices.

5.PDF Generation (DomPDF) Testing
-->Verified placement of user details, original & AI images, and weekly charts.
-->Ensured multi-page format integrity, consistent fonts, and readability.
-->Tested longer content for text overflow or page cut-offs.
-->Checked file naming, download links, and storage paths.

6.Error Handling & Edge Cases
-->Tested missing fields, invalid file types, AI API outages, PDF generation failures, and slow devices.
-->All errors trigger friendly messages without crashing the system.

7.End-to-End Workflow Testing
-->Complete workflow tested: user input → photo upload → BMI calculation → AI diet/exercise plan → AI image generation → PDF creation → report download.

Conclusion
The Health Management System demonstrates how AI can personalize health and fitness recommendations using user data such as age, gender, height, weight, activity level, and an uploaded photo. It generates a BMI-based health report, customized diet and exercise plans, and an AI-created motivational image, all compiled into a standardized PDF for easy reading.This project highlights the integration of AI with traditional health assessments, automation, and PDF generation, providing a streamlined approach to wellness tracking. It also showcases backend development, API integration, and prompt engineering, laying the foundation for a future fully integrated digital health assistant.
