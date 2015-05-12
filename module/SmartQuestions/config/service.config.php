<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartQuestions
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Config
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartQuestions;

return array(
    'abstract_factories' => array(
        'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
        'Zend\Log\LoggerAbstractServiceFactory',
    ),
    'aliases' => array(
        'SmartQuestions\ObjectManager' => 'Doctrine\ORM\EntityManager',
    ),
    'invokables' => array(
        'SmartQuestions\Entity\GradesPrototype'                	=> 'SmartQuestions\Entity\Grades',
        'SmartQuestions\Entity\QuestionsPrototype'             	=> 'SmartQuestions\Entity\Questions',
        'SmartQuestions\Entity\SubjectsPrototype'             	=> 'SmartQuestions\Entity\Subjects',
        'SmartQuestions\Entity\ResultsPrototype'                => 'SmartQuestions\Entity\Results',
    ),
    'factories' => array(
        'SmartQuestions\Options\SmartQuestionsOptions'         	=> 'SmartQuestions\Options\Factory\SmartQuestionsOptionsFactory',
        'SmartQuestions\Service\SmartQuestionService'          	=> 'SmartQuestions\Service\Factory\SmartQuestionServiceFactory',
        'SmartQuestions\Config'                               	=> 'SmartQuestions\Factory\ConfigFactory',
        'SmartQuestions\Repository\GradesRepository'           	=> 'SmartQuestions\Repository\Factory\GradesRepositoryFactory',
        'SmartQuestions\Repository\QuestionsRepository'         => 'SmartQuestions\Repository\Factory\QuestionsRepositoryFactory',
        'SmartQuestions\Repository\SubjectsRepository'          => 'SmartQuestions\Repository\Factory\SubjectsRepositoryFactory',
        'SmartQuestions\Repository\ResultsRepository'           => 'SmartQuestions\Repository\Factory\ResultsRepositoryFactory',
        'SmartQuestions\Service\GradesService'               	=> 'SmartQuestions\Service\Factory\GradesServiceFactory',
        'SmartQuestions\Service\QuestionsService'               => 'SmartQuestions\Service\Factory\QuestionsServiceFactory',
        'SmartQuestions\Service\SubjectsService'               	=> 'SmartQuestions\Service\Factory\SubjectsServiceFactory',
        'SmartQuestions\Service\ResultsService'               	=> 'SmartQuestions\Service\Factory\ResultsServiceFactory',
	),
);
