<?php

use Askme\Domain\Answers\Answer;
use Askme\Domain\Questions\Question;
use Askme\Domain\Recommendations\Recommend;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		for ($i = 0; $i < 5; $i++) {
			$fake = Faker\Factory::create();

			Question::create(array(
				'question' => $fake->realText(50),
			));
		}

		for ($i = 0; $i < 15; $i++) {
			$fake = Faker\Factory::create();

			Answer::create(array(
				'answer' => $fake->realText(20),
			));
		}

		for ($i = 0; $i < 15; $i++) {
			$fake = Faker\Factory::create();

			Recommend::create(array(
				'recommendation' => $fake->realText(60),
			));
		}
	}

}
