<?php

declare(strict_types=1);

use PHPUnit\Framework\TestCase;

final class ConnectPOCTest extends TestCase {

// 	public function test01(): void {
// 		$pdo = new PDO('mysql:host=192.168.99.100;dbname=database', 'root', 'meusql');
// 		$statement = $pdo->query("show databases");
// 		$row = $statement->fetch(PDO::FETCH_ASSOC);
// 		var_dump($row);
// 		echo htmlentities($row['some_field']);
// 	}

	public function test01() {
		$stack = [];
		$this->assertEquals(0, count($stack));
	}
}