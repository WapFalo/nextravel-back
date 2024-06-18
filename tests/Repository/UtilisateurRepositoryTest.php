namespace App\Tests\Repository;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use App\Entity\Utilisateur;

class UtilisateurRepositoryTest extends KernelTestCase
{
private $entityManager;

protected function setUp(): void
{
$kernel = self::bootKernel();
$this->entityManager = $kernel->getContainer()
->get('doctrine')
->getManager();
}

public function testUtilisateurCreation()
{
$utilisateur = new Utilisateur();
$utilisateur->setName('Jane Doe');
$utilisateur->setRoleId(null);
$utilisateur->setGroupeId(null);
$utilisateur->setEmail('jane.doe@example.com');

$this->entityManager->persist($utilisateur);
$this->entityManager->flush();

$utilisateurRepository = $this->entityManager->getRepository(Utilisateur::class);
$savedUtilisateur = $utilisateurRepository->findOneBy(['email' => 'jane.doe@example.com']);

$this->assertSame('Jane Doe', $savedUtilisateur->getName());
$this->assertSame(null, $savedUtilisateur->getRoleId());
$this->assertSame(null, $savedUtilisateur->getGroupeId());
$this->assertSame('jane.doe@example.com', $savedUtilisateur->getEmail());
}

protected function tearDown(): void
{
parent::tearDown();
$this->entityManager->close();
$this->entityManager = null;
}
}