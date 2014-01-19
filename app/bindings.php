<?php

App::bind('Cardgameapi\Repositories\QuestionRepositoryInterface', 'Cardgameapi\Repositories\DbQuestionRepository');
App::bind('Cardgameapi\Repositories\CategoryRepositoryInterface', 'Cardgameapi\Repositories\DbCategoryRepository');
App::bind('Cardgameapi\Repositories\UserRepositoryInterface', 'Cardgameapi\Repositories\DbUserRepository');