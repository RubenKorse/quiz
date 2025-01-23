# Code Convention for [Your Project Name]

This document outlines the coding standards and best practices for the project. By following these conventions, we ensure that the codebase remains clean, consistent, and maintainable.

## 1. Naming Conventions

- **Model Names**: Use **PascalCase** for model names (e.g., `Quiz`, `User`, `Question`).
- **Table Names**: Use **snake_case** and plural for table names (e.g., `users`, `quizzes`, `questions`, `question_user`).
- **Column Names**: Use **snake_case** (e.g., `created_at`, `updated_at`, `awnser`, `correct`).
- **Controller Method Names**: Use **camelCase** for methods in controllers (e.g., `showQuizQuestions`, `uploadQuiz`).
- **Route Names**: Use **kebab-case** for route names (e.g., `admin.quiz.upload`, `user.quiz.show`).
- **Blade Component Names**: Use **kebab-case** (e.g., `x-app-layout`, `x-nav-link`).

## 2. Indentation & Spacing

- **Tabs**: Use **4 spaces per indentation level**. No tabs.
- **Blank Lines**: Separate class definitions, methods, and functions with a single blank line.
- **Between Functions**: Keep a single blank line between functions to improve readability.
- **Braces**: Always use **curly braces** on the same line as the statement for consistency.
    ```php
    if ($condition) {
        // code
    }
    ```

## 3. Code Style

- **Variables**: Use **camelCase** for variable names (e.g., `$quizName`, `$userAnswers`).
- **Constants**: Use **UPPERCASE** for constants (e.g., `MAX_FILE_SIZE`).
- **Method Names**: Use **camelCase** for method names (e.g., `uploadQuiz`, `saveAnswer`).
- **Class Properties**: Use **camelCase** for property names (e.g., `$quizId`, `$userAnswers`).
- **Access Modifiers**: Always define **public** or **protected** for methods and properties. **Private** should be used only when necessary.

## 4. Database & Eloquent Conventions

- **Timestamps**: Always use `timestamps()` in migrations unless there's a specific reason not to.
    ```php
    $table->timestamps();
    ```
- **Foreign Keys**: Always define **foreign key constraints** and use `constrained()` or `onDelete('cascade')` for automatic clean-up.
    ```php
    $table->foreignId('quiz_id')->constrained()->onDelete('cascade');
    ```
- **Pivot Tables**: Use **singular names** in pivot table relationships, e.g., `question_user`, not `user_questions`.

## 5. Comments & Documentation

- **Short Comments**: Use comments where necessary, but avoid over-commenting. The code should be self-explanatory most of the time.
    ```php
    // Calculate the total score
    $totalScore = calculateScore($user);
    ```
- **Docblocks**: Use **docblocks** for complex methods or public methods.
    ```php
    /**
     * Get all the questions for a quiz.
     *
     * @param int $quizId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getQuestions(int $quizId)
    {
        return Quiz::find($quizId)->questions;
    }
    ```

## 6. Blade Templates

- **Class Names**: Avoid inline **`class`** definitions inside `@class` directives in Blade templates. Use Blade components or classes in a separate CSS file.
- **Blade Directives**: Prefer using **`@`** Blade directives over raw PHP.
    ```php
    @foreach ($items as $item)
        <div>{{ $item }}</div>
    @endforeach
    ```
- **Conditionals and Loops**: Ensure they are readable and well-organized.
    ```php
    @if ($quiz->isActive())
        <p>The quiz is active</p>
    @else
        <p>The quiz is not active</p>
    @endif
    ```

## 7. Controller & Routes

- **Controllers**: Group related methods under specific controller classes (e.g., `QuizController`, `UserController`). Keep the methods clean and concise.
- **RESTful Resource Controllers**: Use **resource controllers** when possible for CRUD actions.
    ```php
    Route::resource('quizzes', QuizController::class);
    ```
- **Route Groups**: Use **route groups** with middleware or namespace for organization.
    ```php
    Route::prefix('admin')->middleware('auth', 'isTeacher')->group(function () {
        Route::resource('quizzes', QuizController::class);
    });
    ```

## 8. Security & Best Practices

- **Mass Assignment**: Always protect your models with **fillable** or **guarded** properties.
    ```php
    protected $fillable = ['name', 'description'];
    ```
- **Validation**: Always validate incoming requests to ensure data integrity.
    ```php
    $request->validate([
        'name' => 'required|max:255',
        'file' => 'required|mimes:csv,txt|max:2048',
    ]);
    ```

## 9. Testing

- **Tests Location**: Store your tests in the appropriate directories: 
  - **Feature tests** in `tests/Feature`.
  - **Unit tests** in `tests/Unit`.
- **Test Names**: Use descriptive names for your test methods.
    ```php
    /** @test */
    public function a_user_can_upload_a_quiz()
    {
        // Test code
    }
    ```
- **Test Structure**: Write tests for the core functionality, especially for critical paths like file uploads, form submissions, and user interaction.

## 10. General Best Practices

- **Consistent Naming**: Keep naming conventions consistent across the app. For example, always name models with **PascalCase** and tables with **snake_case**.
- **Single Responsibility**: Ensure each method and class has a single responsibility. A controller method should perform a single task.
- **Reusability**: Avoid duplicating code. Use helper methods, services, and events to keep your codebase clean.
